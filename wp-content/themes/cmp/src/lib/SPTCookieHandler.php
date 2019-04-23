<?php

/* A wrapper class to handle session data required for tracking visitors in SPT.
** Compatible with Native PHP sessions and the WP Session Manager plugin by
** Eric Mann for those on servers without $_COOKIE support. */
final class SPTCookieHandler {
    private $_sessionHandlerType;
    private $_sessionStarted;

    function __construct() {
        $this->_sessionHandlerType = 'native';
        $this->startSession();
    }

    public function startSession() {
        if (!$this->_sessionStarted) {
            if ($this->_sessionHandlerType == 'native') {
                $this->_sessionStarted = true;
            } else {
                error_log('Attempt to start session failed. Invalid session handler type.');
                return;
            }
        }
    }

    public function endSession() {
        if ($this->_sessionStarted) {
            if ($this->_sessionHandlerType == 'native') {
                $this->_sessionStarted = false;
            }
        }
    }

    public function getData($key) {
        if (!$this->_sessionStarted) {
            error_log('Session wasn\'t started on attempt to get key [' . $key . ']');
            return;
        }

        if ($this->_sessionHandlerType == 'native') {
            if (isset($_COOKIE[$key]))
                $value = $_COOKIE[$key];
            else
                $value = '';
        } else {
            error_log('Session handler type was invalid during attempt to get key [' . $key . ']');
            return;
        }

        return $value;
    }

    public function setData($key, $value) {
        if (!$this->_sessionStarted) {
            error_log('Session wasn\'t started on attempt to set key [' . $key . ']');
            return;
        }

        if ($this->_sessionHandlerType == 'native') {
            setcookie($key, $value, 0, "/");
        } else {
            error_log('Session handler type was invalid during attempt to set key [' . $key . ']');
            return;
        }
    }

    public function unsetData($key) {
        if (!$this->_sessionStarted) {
            error_log('Session wasn\'t started on attempt to set key [' . $key . ']');
            return;
        }

        if ($this->_sessionHandlerType == 'native') {
            setcookie($key, $value, 1, "/");
        } else {
            error_log('Session handler type was invalid during attempt to set key [' . $key . ']');
            return;
        }

    }
}

global $sptSession;

if (!is_admin()) {
    $sptSession = new SPTCookieHandler();
}

?>
