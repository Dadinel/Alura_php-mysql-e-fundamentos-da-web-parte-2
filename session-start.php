<?php

    startSession();

    function startSession() {
        if(session_status() != PHP_SESSION_ACTIVE) {
            session_start();
        }
    }