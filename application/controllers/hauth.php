<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class HAuth extends CI_Controller {

    public function __construct() {
        // Constructor to auto-load HybridAuthLib
        parent::__construct();
        $this->load->library('HybridAuthLib');
        $this->load->library('flexi_auth');
        $this->load->model('flexi_auth_model');
    }

    public function index() {
        // Send to the view all permitted services as a user profile if authenticated
        $data['providers'] = $this->hybridauthlib->getProviders();
        foreach ($data['providers'] as $provider => $d) {
            if ($d['connected'] == 1) {
                $data['providers'][$provider]['user_profile'] = $this->hybridauthlib->authenticate($provider)->getUserProfile();
            }
        }
        $this->load->view('hauth/home', $data);
    }

    public function login($provider) {
        $redirect_uri = $this->input->get('redirect_uri');

        log_message('debug', "controllers.HAuth.login($provider) called");

        try {
            log_message('debug', 'controllers.HAuth.login: loading HybridAuthLib');


            if ($this->hybridauthlib->providerEnabled($provider)) {
                log_message('debug', "controllers.HAuth.login: service $provider enabled, trying to authenticate.");
                $service = $this->hybridauthlib->authenticate($provider);

                if ($service->isUserConnected()) {

                    log_message('debug', 'controller.HAuth.login: user authenticated.');

                    $user_profile = $service->getUserProfile();

                    log_message('info', 'controllers.HAuth.login: user profile:' . PHP_EOL . print_r($user_profile, TRUE));

                    $data['user_profile'] = $user_profile;
                    $name = explode(" ", $user_profile->displayName);
                    $email = $user_profile->email;
                    $email_array = explode('@', $user_profile->email);
                    $username = $email_array[0];
                    $password = '23456789BbCcDdFfGgHh' . $username . 'JjKkMmNnPpQqRrSsTtVvWwXxYyZz';
                    $insert_profile_data = array(
                        'upro_type' => "customer",
                        'upro_first_name' => $user_profile->displayName,
                        'uacc_hybrid_identifier' => $user_profile->identifier,
                        'upro_last_name' => $name[0],
                        'upro_phone' => $name[1],
                        'upro_newsletter' => 1,
                        'ugrp_id' => 1,
                        'uacc_parent_id_fk' => 0,
                        'uacc_active' => 1
                    );
                    $random = rand(0, 999);
                    if (!empty($email)) {//no email id
                        $num_rows = $this->common_model->num_rows('user_accounts', array('uacc_email' => $user_profile->email));
                        //echo $query->num_rows();
                        if ($num_rows == 0) {
                            $insert_id = $this->flexi_auth_model->insert_user($email, $username, $password, $insert_profile_data, 1, 1);
                        } else {
                            $update_account_data = array(
                                'uacc_hybrid_identifier' => $user_profile->identifier,
                                'uacc_active' => 1
                            );
                            $update_profile_data = array(
                                'upro_type' => "customer",
                                'upro_first_name' => $user_profile->displayName,
                                'upro_last_name' => $name[0],
                                'upro_phone' => $name[1],
                                'upro_newsletter' => 1,
                            );
                            $user = $this->common_model->fetch_where('user_accounts', '*', array('uacc_email' => $email))[0];
                            $this->common_model->update_data('user_accounts', array('uacc_email' => $user_profile->email), $update_account_data);
                            $this->common_model->update_data('user_profiles', array('upro_uacc_fk' => $user['uacc_id']), $update_profile_data);
                        }
                    } else {
                        throw new Exception("Email not found");
                    }
                    $new_account_data = $this->common_model->fetch_row_obj('user_accounts', '*', array('uacc_email' => $email));
                    $this->flexi_auth->set_login_session($new_account_data, FALSE);
                    redirect($redirect_uri);
                } else { // Cannot authenticate user
                    show_error('Cannot authenticate user');
                }
            } else { // This service is not enabled.
                log_message('error', 'controllers.HAuth.login: This provider is not enabled (' . $provider . ')');
                show_404($_SERVER['REQUEST_URI']);
            }
        } catch (Exception $e) {
            $error = 'Unexpected error';
            switch ($e->getCode()) {
                case 0 : $error = 'Unspecified error.';
                    break;
                case 1 : $error = 'HybridAuth configuration error.';
                    break;
                case 2 : $error = 'Provider not properly configured.';
                    break;
                case 3 : $error = 'Unknown or disabled provider.';
                    break;
                case 4 : $error = 'Missing provider application credentials.';
                    break;
                case 5 : log_message('debug', 'controllers.HAuth.login: Authentification failed. The user has canceled the authentication or the provider refused the connection.');
                    //redirect();
                    if (isset($service)) {
                        log_message('debug', 'controllers.HAuth.login: logging out from service.');
                        $service->logout();
                    }
                    show_error('User has cancelled the authentication or the provider refused the connection.');
                    break;
                case 6 : $error = 'User profile request failed. Most likely the user is not connected to the provider and he should to authenticate again.';
                    break;
                case 7 : $error = 'User not connected to the provider.';
                    break;
            }

            if (isset($service)) {
                $service->logout();
            }

            log_message('error', 'controllers.HAuth.login: ' . $error);
            show_error('Error authenticating user.');
        }
    }

    public function logout($provider = "") {

        log_message('debug', "controllers.HAuth.logout($provider) called");

        try {
            if ($provider == "") {

                log_message('debug', "controllers.HAuth.logout() called, no provider specified. Logging out of all services.");
                $data['service'] = "all";
                $this->hybridauthlib->logoutAllProviders();
            } else {
                if ($this->hybridauthlib->providerEnabled($provider)) {
                    log_message('debug', "controllers.HAuth.logout: service $provider enabled, trying to check if user is authenticated.");
                    $service = $this->hybridauthlib->authenticate($provider);

                    if ($service->isUserConnected()) {
                        log_message('debug', 'controller.HAuth.logout: user is authenticated, logging out.');
                        $service->logout();
                        $data['service'] = $provider;
                    } else { // Cannot authenticate user
                        show_error('User not authenticated, success.');
                        $data['service'] = $provider;
                    }
                } else { // This service is not enabled.
                    log_message('error', 'controllers.HAuth.login: This provider is not enabled (' . $provider . ')');
                    show_404($_SERVER['REQUEST_URI']);
                }
            }
            // Redirect back to the main page. We're done with logout
            redirect('hauth/', 'refresh');
        } catch (Exception $e) {
            $error = 'Unexpected error';
            switch ($e->getCode()) {
                case 0 : $error = 'Unspecified error.';
                    break;
                case 1 : $error = 'Hybriauth configuration error.';
                    break;
                case 2 : $error = 'Provider not properly configured.';
                    break;
                case 3 : $error = 'Unknown or disabled provider.';
                    break;
                case 4 : $error = 'Missing provider application credentials.';
                    break;
                case 5 : log_message('debug', 'controllers.HAuth.login: Authentification failed. The user has canceled the authentication or the provider refused the connection.');
                    //redirect();
                    if (isset($service)) {
                        log_message('debug', 'controllers.HAuth.login: logging out from service.');
                        $service->logout();
                    }
                    show_error('User has cancelled the authentication or the provider refused the connection.');
                    break;
                case 6 : $error = 'User profile request failed. Most likely the user is not connected to the provider and he should to authenticate again.';
                    break;
                case 7 : $error = 'User not connected to the provider.';
                    break;
            }

            if (isset($service)) {
                $service->logout();
            }

            log_message('error', 'controllers.HAuth.login: ' . $error);
            show_error('Error authenticating user.');
        }
    }

    // Little json api and variable output testing function. Make it easy with JS to verify a session.  ;)
    public function status($provider = "") {
        try {
            if ($provider == "") {
                log_message('debug', "controllers.HAuth.status($provider) called, no provider specified. Providing details on all connected services.");
                $connected = $this->hybridauthlib->getConnectedProviders();

                if (count($connected) == 0) {
                    $data['status'] = "User not authenticated.";
                } else {
                    $connected = $this->hybridauthlib->getConnectedProviders();
                    foreach ($connected as $provider) {
                        if ($this->hybridauthlib->providerEnabled($provider)) {
                            log_message('debug', "controllers.HAuth.status: service $provider enabled, trying to check if user is authenticated.");
                            $service = $this->hybridauthlib->authenticate($provider);
                            if ($service->isUserConnected()) {
                                log_message('debug', 'controller.HAuth.status: user is authenticated to $provider, providing profile.');
                                $data['status'][$provider] = (array) $this->hybridauthlib->getAdapter($provider)->getUserProfile();
                            } else { // Cannot authenticate user
                                $data['status'][$provider] = "User not authenticated.";
                            }
                        } else { // This service is not enabled.
                            log_message('error', 'controllers.HAuth.status: This provider is not enabled (' . $provider . ')');
                            $data['status'][$provider] = "provider not enabled.";
                        }
                    }
                }
            } else {
                if ($this->hybridauthlib->providerEnabled($provider)) {
                    log_message('debug', "controllers.HAuth.status: service $provider enabled, trying to check if user is authenticated.");
                    $service = $this->hybridauthlib->authenticate($provider);
                    if ($service->isUserConnected()) {
                        log_message('debug', 'controller.HAuth.status: user is authenticated to $provider, providing profile.');
                        $data['status'][$provider] = (array) $this->hybridauthlib->getAdapter($provider)->getUserProfile();
                    } else { // Cannot authenticate user
                        $data['status'] = "User not authenticated.";
                    }
                } else { // This service is not enabled.
                    log_message('error', 'controllers.HAuth.status: This provider is not enabled (' . $provider . ')');
                    $data['status'] = "provider not enabled.";
                }
            }
            $this->load->view('hauth/status', $data);
        } catch (Exception $e) {
            $error = 'Unexpected error';
            switch ($e->getCode()) {
                case 0 : $error = 'Unspecified error.';
                    break;
                case 1 : $error = 'Hybriauth configuration error.';
                    break;
                case 2 : $error = 'Provider not properly configured.';
                    break;
                case 3 : $error = 'Unknown or disabled provider.';
                    break;
                case 4 : $error = 'Missing provider application credentials.';
                    break;
                case 5 : log_message('debug', 'controllers.HAuth.login: Authentification failed. The user has canceled the authentication or the provider refused the connection.');
                    //redirect();
                    if (isset($service)) {
                        log_message('debug', 'controllers.HAuth.login: logging out from service.');
                        $service->logout();
                    }
                    show_error('User has cancelled the authentication or the provider refused the connection.');
                    break;
                case 6 : $error = 'User profile request failed. Most likely the user is not connected to the provider and he should to authenticate again.';
                    break;
                case 7 : $error = 'User not connected to the provider.';
                    break;
            }

            if (isset($service)) {
                $service->logout();
            }

            log_message('error', 'controllers.HAuth.login: ' . $error);
            show_error('Error authenticating user.');
        }
    }

    public function endpoint() {

        log_message('debug', 'controllers.HAuth.endpoint called.');
        log_message('info', 'controllers.HAuth.endpoint: $_REQUEST: ' . print_r($_REQUEST, TRUE));

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            log_message('debug', 'controllers.HAuth.endpoint: the request method is GET, copying REQUEST array into GET array.');
            $_GET = $_REQUEST;
        }

        log_message('debug', 'controllers.HAuth.endpoint: loading the original HybridAuth endpoint script.');
        require_once APPPATH . '/third_party/hybridauth/index.php';
    }

}

/* End of file hauth.php */
/* Location: ./application/controllers/hauth.php */
