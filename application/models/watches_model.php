<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Watches_Model extends CI_Model
{


    function __construct()
    {
        parent::__construct();

        $this->load->library(array('ion_auth'));

        if ( ! $this->ion_auth->logged_in())
        {
            redirect(base_url() . 'auth/login');
        }

        $this->load->database();
    }


    /**
    * Adds the portfolio to the watch list for a user.
    *
    * @param  integer   $portfolio_id   ID of the portfolio to watch.
    * @param  integer   $user_id   ID of the user.
    *
    * @return boolean   true if success else false.
    */
    function watch($portfolio_id, $user_id)
    {
        throw new Exception('Not implemented');
    }


    /**
    * Removes the portfolio from the watch list for a user.
    *
    * @param  integer   $portfolio_id   ID of the portfolio to unwatch.
    * @param  integer   $user_id   ID of the user.
    *
    * @return boolean   true if success else false.
    */
    function unwatch($portfolio_id, $user_id)
    {
        throw new Exception('Not implemented');
    }


    /**
    * Checks if the portfolio is in the watch list for a user.
    *
    * @param  integer   $portfolio_id   ID of the portfolio.
    * @param  integer   $user_id   ID of the user.
    *
    * @return boolean   true if portfolio in watch list, false otherwise.
    */
    function is_watching($portfolio_id, $user_id)
    {
        throw new Exception('Not implemented');
    }


    /**
    * Generates a list of watched portfolios for a user.
    *
    * @param  integer   $user_id   ID of the user.
    *
    * @return query     $query
    */
    function list_watches_user($user_id)
    {
        throw new Exception('Not implemented');
    }


    /**
    * Generates a list of users thats have watched a portfolio.
    *
    * @param integer    $portfolio_id    ID of the portfolio.
    *
    * @return query     $query
    */
    function list_watches_portfolio($user_id)
    {
        throw new Exception('Not implemented');
    }
}
