<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * InvoicePlane
 * 
 * A free and open source web based invoicing system
 *
 * @package		InvoicePlane
 * @author		Kovah (www.kovah.de)
 * @copyright	Copyright (c) 2012 - 2015 InvoicePlane.com
 * @license		https://invoiceplane.com/license.txt
 * @link		https://invoiceplane.com
 * 
 */

function invoice_logo()
{
    $CI = & get_instance();
	
    if ($CI->mdl_settings->setting('invoice_logo'))
    {
        return '<img src="' . base_url() . 'uploads/' . $CI->mdl_settings->setting('invoice_logo') . '">';
    }
    return '';
}

function invoice_logo_pdf()
{
    $CI = & get_instance();

    if ($CI->mdl_settings->setting('invoice_logo'))
    {
        return '<img src="' . getcwd() . '/uploads/' . $CI->mdl_settings->setting('invoice_logo') . '" id="invoice-logo">';
    }
    return '';
}


function return_bytes($val) 
{
    $val = trim($val);
    $last = strtolower($val[strlen($val)-1]);

    switch($last) 
    {
        case 'g':
        $val *= 1024;
        case 'm':
        $val *= 1024;
        case 'k':
        $val *= 1024;
    }

    return $val;
}

function get_upload_max_filesize()
{
    $max_upload = return_bytes(ini_get('upload_max_filesize'));
    $max_post = return_bytes(ini_get('post_max_size'));
    return min($max_upload, $max_post);
}

?>
