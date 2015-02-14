<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Portfolio_Model extends CI_Model
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
    * Checks if the portfolio exists.
    *
    * @param integer   $portfolio_id   ID of the portfolio to check.
    *
    * @return boolean
    */
    function is_valid_portfolio($portfolio_id)
    {
        if ($portfolio_id > 0)
        {
            $this->db->select('portfolio_id');
            $this->db->get_where('portfolio', array('portfolio_id' => $portfolio_id));
            if ($this->db->affected_rows() == 1)
            {
                return true;
            }
        }

        return false;
    }


    /**
    * Adds a new portfolio for the logged in user.
    *
    * @param string    $name         Name of the portfolio.
    * @param string    $description  Description of the portfolio.
    * @param integer   $cash         Starting cash value of the portfolio.
    *
    * @return integer   $portfolio_id
    */
    function add_portfolio($name, $description, $cash)
    {
        $data = array(
            'user_id' => $this->ion_auth->user()->row()->id,
            'name' => $name,
            'description' => $description,
            'cash' => $cash,
            'favourites' => 0,
            'watches' => 0,
            'votes' => 0
        );

        $this->db->insert('portfolio', $data);
        $portfolio_id = $this->db->insert_id();

        return $portfolio_id;
    }


    /**
    * Deletes a portfolio given the portfolio_id.
    *
    * @param integer   $portfolio_id   ID of the portfolio to delete.
    *
    * @return void
    */
    function delete_portfolio($portfolio_id)
    {
        if ($this->is_valid_portfolio($portfolio_id))
        {
            $this->db->delete('portfolio', array('portfolio_id' => $portfolio_id));
            $this->db->delete('favourites', array('portfolio_id' => $portfolio_id));
            $this->db->delete('watches', array('portfolio_id' => $portfolio_id));
            #$this->db->delete('votes', array('portfolio_id' => $portfolio_id));
        }
    }


    /**
    * Generates a list of portfolios.
    *
    * @param integer    $user_id    ID of the user.
    *
    * @return query     $query
    */
    function list_portfolios($user_id = 0)
    {
        $this->db->select('portfolio_id, user_id, name, description, cash, watches, favourites');
        $this->db->from('portfolio');
        if ($user_id != 0)
        {
            $this->db->where('user_id', $user_id);
        }
        $this->db->order_by("cash desc");
        $query = $this->db->get();

        return $query;
    }
}
