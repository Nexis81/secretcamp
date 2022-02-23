<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Site extends BaseConfig 
{
	
    public $siteName = '';
    public $siteTitle = '';
    public $siteDomain  = '';
    public $siteUrl = 'http://www.example.com';
    public $siteSecureUrl = 'https://www.example.com';
    public $siteEmail = 'webmaster@example.com';

    public $authorName = '';
    public $authorEmail = '';
    public $authorCompany = '';
    public $authorCompanyEmail = '';
    public $authorURL = '';

    /**
     * Google Site Verification & Maps Key
     */
    public $googleSiteVerificationKey  = '';
    public $googleMapsApiKey  = '';

    /**
     * Default Meta and Page Title info
     */
    public $defaultPageTitle = "";
    public $defaultMetaDesc = "";
    public $defaultMetaKeywords = "";
    public $defaultRobots = "";


}