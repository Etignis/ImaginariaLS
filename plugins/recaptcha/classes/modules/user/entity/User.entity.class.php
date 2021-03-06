<?php
/* ---------------------------------------------------------------------------
 * @Plugin Name: reCAPTCHA
 * @Description: Replaces the standard captcha for reCAPTCHA
 * @Author URI: http://livestreet.net
 * @LiveStreet Version: 1.0.3
 * @Plugin Version:	4.0.0
 * ----------------------------------------------------------------------------
*/

use ReCaptcha\ReCaptcha;

class PluginRecaptcha_ModuleUser_EntityUser extends PluginRecaptcha_Inherit_ModuleUser_EntityUser
{

    private function getIp()
    {
        if (!isset ($_SERVER['REMOTE_ADDR'])) {
            return NULL;
        }

        if (array_key_exists("HTTP_X_FORWARDED_FOR", $_SERVER)) {
            $http_x_forwared_for = explode(",", $_SERVER["HTTP_X_FORWARDED_FOR"]);
            $client_ip = trim(end($http_x_forwared_for));
            if (filter_var($client_ip, FILTER_VALIDATE_IP)) {
                return $client_ip;
            }
        }

        return filter_var($_SERVER['REMOTE_ADDR'], FILTER_VALIDATE_IP) ? $_SERVER['REMOTE_ADDR'] : NULL;
    }

    /**
     * Определяем дополнительные правила валидации
     *
     * @param array
     */
    public function __construct($aParam = false)
    {
        $this->aValidateRules[] = array('captcha', 'recaptcha', 'on' => array('registration'));
        parent::__construct($aParam);
    }

    public function ValidateRecaptcha($sValue)
    {
        $recaptcha_secret = Config::Get('plugin.recaptcha.private_key');
        $recaptcha_response = getRequestStr('g-recaptcha-response');

        $recaptcha = new ReCaptcha($recaptcha_secret);
        $checkout = $recaptcha->verify($recaptcha_response, $this->getIp());

        if (!$checkout->isSuccess()) {
            return $this->Lang_Get('validate_captcha_not_valid', null, false);
        }


        return true;
    }
}

?>