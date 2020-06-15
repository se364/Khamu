<?php

/**
 * Class Validation
 */
class Validation
{
    /**
     * Returns a value indicating if name is a parameter
     * Valid name are not empty and do not contain anything except letters
     * @param $name
     * @return bool
     */
    function validName($name)
    {
        return !empty(trim($name));
    }

    /**
     * Returns a value indicating if email is a parameter
     * Valid name are not empty and do not contain anything except letters
     * @param $email
     * @return bool
     */
    function validEmail($email)
    {
        return !empty(trim($email)) && strpos($email, "@") && strpos($email, ".");
    }

    /**
     * Returns a value indicating if phone is a parameter
     * Valid name are not empty and do not contain anything except letters
     * @param $phone
     * @return bool
     */
    function validPhone($phone)
    {
        return !empty(trim($phone) && strlen($phone) == 10);
    }

    /**
     * Returns a value indicating if date is a parameter
     * Valid name are not empty and do not contain anything except letters
     * @param $date
     * @return bool
     */
    function validDate($date)
    {
        $explodeDate = explode("-", $date);
        $year = $explodeDate[0];
        $month = $explodeDate[1];
        $day = $explodeDate[2];

        return checkdate($month, $day, $year);
    }

}