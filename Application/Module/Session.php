<?php

namespace Application\Module {

    class Session {
        public function createSession() {
            session_start();
        }

        public function isUserLoggedIn() {
            if (!empty($_SESSION['User'])) {
                $Result = true;
            } else {
                $Result = false;
            }
            return $Result;
        }
    }
}

?>