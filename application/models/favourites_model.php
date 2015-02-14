<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Favourites_Model extends CI_Model
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
    * Adds the portfolio to the favourites list for a user.
    *
    * @param  integer   $portfolio_id   ID of the portfolio to favourite.
    * @param  integer   $user_id   ID of the user.
    *
    * @return boolean   true if success else false.
    */
    function favourite($portfolio_id, $user_id)
    {
        throw new Exception('Not implemented');
    }


    /**
    * Removes the portfolio from the favourites list for a user.
    *
    * @param  integer   $portfolio_id   ID of the portfolio to unfavourite.
    * @param  integer   $user_id   ID of the user.
    *
    * @return boolean   true if success else false.
    */
    function unfavourite($portfolio_id, $user_id)
    {
        throw new Exception('Not implemented');
    }


    /**
    * Checks if the portfolio is in the favourites list for a user.
    *
    * @param  integer   $portfolio_id   ID of the portfolio.
    * @param  integer   $user_id   ID of the user.
    *
    * @return boolean   true if portfolio in favourites list, false otherwise.
    */
    function is_favourite($portfolio_id, $user_id)
    {
        throw new Exception('Not implemented');
    }


    /**
    * Generates a list of favourite portfolios for a user.
    *
    * @param  integer   $user_id   ID of the user.
    *
    * @return query     $query
    */
    function list_favourites_user($user_id)
    {
        throw new Exception('Not implemented');
    }


    /**
    * Generates a list of users thats have favourited a portfolio.
    *
    * @param integer    $portfolio_id    ID of the portfolio.
    *
    * @return query     $query
    */
    function list_favourites_portfolio($user_id)
    {
        throw new Exception('Not implemented');
    }
}
