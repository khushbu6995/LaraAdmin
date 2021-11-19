<?php

namespace App\Repositories;

interface UserInterface
{

    /**
     * get all the record in assending order
     * @author Khushbu Waghela
     */
    public function all();

    /**
     * get single record by id
     * @author Khushbu Waghela
     */
    public function get($id);

    /**
     * get 5 record 
     * @author Khushbu Waghela
     */
    public function getFiveRecords();

    /**
     * get a record by given name or email in search variable
     * @author Khushbu Waghela
     */
    public function searchRecord($search);

    /**
     * Insert record in database
     * @author Khushbu Waghela
     */
    public function store(array $insertFields);

    /**
     * Update Record in database
     * @author Khushbu Waghela
     */
    public function update(array $updateFields);

    /**
     *delete record by id
     * @author Khushbu Waghela
     */
    public function delete($id);

    /**
     *verify email which is available in session or not
     * @author Khushbu Waghela
     */
    public function email_verify();

    /**
     * find record by email
     * @author Khushbu Waghela
     */
    public function email_find($email);

     /**
     * get the password
     * @author Khushbu Waghela
     */
    public function password_check($email,$password);

    /**
     * get the password
     * @author Khushbu Waghela
     */
    public function update_password($email,$password);
}
