<?php

namespace App\Services\Email;

class EmailValidator {


    protected function filter(string $email) {
       return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    protected function getDomain(string $email): string {
        $str = explode("@",$email);
        return array_pop($str);
    }

    public function check(string $email): bool {
        if ($this->filter($email)) {
            if (checkdnsrr($this->getDomain($email))) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

}
