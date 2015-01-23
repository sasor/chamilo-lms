<?php
// Chamilo version {NEW_VERSION}
// File generated by /install/index.php script - {DATE_GENERATED}
/* For licensing terms, see /license.txt */
/**
 * Campus configuration
 *
 * This file contains a list of variables that can be modified by the campus
 * site's server administrator. Pay attention when changing these variables,
 * some changes may cause Chamilo to stop working.
 * If you changed some settings and want to restore them, please have a look at
 * configuration.dist.php. That file is an exact copy of the config file at
 * install time.
 */

/**
 * $_configuration define only the bare essential variables
 * for configuring the platform (paths, database connections, ...).
 * Changing a $_configuration variable CAN generally break the installation.
 * Besides the $_configuration, a $_settings array also exists, that
 * contains variables that can be changed and will not break the platform.
 * These optional settings are defined in the database, now
 * (table settings_current).
 * example: $_configuration['tracking_enabled'] (assuming that the install
 * script creates the necessary tables anyway).
 */

/**
 * MYSQL connection settings
 */
// Your MySQL server
$_configuration['db_host']     = '{DATABASE_HOST}';
// Your MySQL username
$_configuration['db_user']     = '{DATABASE_USER}';
// Your MySQL password
$_configuration['db_password'] = '{DATABASE_PASSWORD}';

/**
 * Database settings
 */
// Is tracking enabled?
$_configuration['tracking_enabled']      = TRACKING_ENABLED;
// Is single database enabled (DO NOT MODIFY THIS)
$_configuration['single_database']       = SINGLE_DATABASE;
// Prefix for course tables (IF NOT EMPTY, can be replaced by another prefix, else leave empty)
$_configuration['table_prefix']          = '{COURSE_TABLE_PREFIX}';
// Separator between database and table name (DO NOT MODIFY THIS)
$_configuration['db_glue']               = '{DATABASE_GLUE}';
// prefix all created bases (for courses) with this string
$_configuration['db_prefix']             = '{DATABASE_PREFIX}';
// main Chamilo database
$_configuration['main_database']         = '{DATABASE_MAIN}';
// stats Chamilo database
$_configuration['statistics_database']   ='{DATABASE_STATS}';
// User Personal Database (where all the personal stuff of the user is stored
// (personal agenda items, course sorting)
$_configuration['user_personal_database']='{DATABASE_PERSONAL}';
// Enable access to database management for platform admins.
$_configuration['db_manager_enabled'] = false;

/**
 * Directory settings
 */
// URL to the root of your Chamilo installation, e.g.: http://www.mychamilo.com/
$_configuration['root_web']       = '{ROOT_WEB}';

// Path to the webroot of system, example: /var/www/
$_configuration['root_sys']       = '{ROOT_SYS}';

// Path from your WWW-root to the root of your Chamilo installation, example: chamilo (this means chamilo is installed in /var/www/chamilo/
$_configuration['url_append']     = '{URL_APPEND_PATH}';

// Directory of the Chamilo code. You could change this but it is not advised since this has not been tested yet.
$_configuration['code_append']    = "main/";

// Directory to store all course-related files. You could change this but it is not advised since this has not been tested yet.
$_configuration['course_folder']  = "courses/";

// URL to your phpMyAdmin installation.
// If not empty, a link will be available in the Platform Administration
$_configuration['db_admin_path']  = '';

/**
 * Login modules settings
 */
// CAS IMPLEMENTATION
// -> Go to your portal Chamilo > Administration > CAS to activate CAS
// You can leave these lines uncommented even if you don't use CAS authentification
$extAuthSource["cas"]["login"] = $_configuration['root_sys'].$_configuration['code_append']."auth/cas/login.php";
$extAuthSource["cas"]["newUser"] = $_configuration['root_sys'].$_configuration['code_append']."auth/cas/newUser.php";
//
// NEW LDAP IMPLEMENTATION BASED ON external_login info
// -> Uncomment the two lines bellow to activate LDAP AND edit main/auth/external_login/ldap.conf.php for configuration
// $extAuthSource["extldap"]["login"] = $_configuration['root_sys'].$_configuration['code_append']."auth/external_login/login.ldap.php";
// $extAuthSource["extldap"]["newUser"] = $_configuration['root_sys'].$_configuration['code_append']."auth/external_login/newUser.ldap.php";
//
// FACEBOOK IMPLEMENTATION BASED ON external_login info
// -> Uncomment the line bellow to activate Facebook Auth AND edit main/auth/external_login/ldap.conf.php for configuration
// $_configuration['facebook_auth'] = 1;
//
// OTHER EXTERNAL LOGIN INFORMATION
// To fetch external login information, uncomment those 2 lines and modify  files auth/external_login/newUser.php and auth/external_login/updateUser.php files
// $extAuthSource["external_login"]["newUser"] = $_configuration['root_sys'].$_configuration['code_append']."auth/external_login/newUser.php";
// $extAuthSource["external_login"]["updateUser"] = $_configuration['root_sys'].$_configuration['code_append']."auth/external_login/updateUser.php";

/**
 *
 * Hosting settings - Allows you to set limits to the Chamilo portal when
 * hosting it for a third party. These settings can be overwritten by an
 * optionally-loaded extension file with only the settings (no comments).
 * The settings use an index at the first level to represent the ID of the
 * URL in case you use multi-url (otherwise it will always use 1, which is
 * the ID of the only URL inside the access_url table).
 */
// Set a maximum number of users. Default (0) = no limit
$_configuration[1]['hosting_limit_users'] = 0;
// Set a maximum number of teachers. Default (0) = no limit
$_configuration[1]['hosting_limit_teachers'] = 0;
// Set a maximum number of courses. Default (0) = no limit
$_configuration[1]['hosting_limit_courses'] = 0;
// Set a maximum number of sessions. Default (0) = no limit
$_configuration[1]['hosting_limit_sessions'] = 0;
// Set a maximum disk space used, in MB (set to 1024 for 1GB, 5120 for 5GB, etc)
// Default (0) = no limit
$_configuration[1]['hosting_limit_disk_space'] = 0;
// Set a maximum number of usable courses. Default (0) = no limit. Should always be lower than the hosting_limit_courses.
// If set, defining a course as "hidden" will free room for new courses (up to the hosting_limit_courses, if any value is set there).
// hosting_limit_enabled_courses is the maximum number of courses that are *not* hidden.
$_configuration[1]['hosting_limit_active_courses'] = 0;
// Email to warn if limit was reached.
//$_configuration[1]['hosting_contact_mail'] = 'example@example.org';
// Portal size limit in MB (set to 1024 for 1GB, 5120 for 5GB, etc).
$_configuration['hosting_total_size_limit'] = 0;

/**
 * Content Delivery Network (CDN) settings. Only use if you need a separate
 * server to serve your static data. If you don't know what a CDN is, you
 * don't need it. These settings are for simple Origin Pull CDNs and are
 * experimental. Enable only if you really know what you're doing.
 * This might conflict with multiple-access urls.
 */
// Set the following setting to true to start using the CDN
$_configuration['cdn_enable'] = false;
// The following setting will be ignored if the previous one is set to false
$_configuration['cdn'] = array(
  //You can define several CDNs and split them by extensions
  //Replace the following by your full CDN URL, which should point to
  // your Chamilo's root directory. DO NOT INCLUDE a final slash! (won't work)
  'http://cdn.chamilo.org' => array('.css','.js','.jpg','.jpeg','.png','.gif','.avi','.flv'),
  // copy the line above and modify following your needs
);

/**
 * Misc. settings
 */
// Verbose backup
$_configuration['verbose_backup']    = false;
// security word for password recovery
$_configuration['security_key']      = '{SECURITY_KEY}';
// Hash function method
$_configuration['password_encryption']      = '{ENCRYPT_PASSWORD}';
// You may have to restart your web server if you change this
$_configuration['session_stored_in_db']     = false;
// Session lifetime
$_configuration['session_lifetime']  = SESSION_LIFETIME;
// Activation for multi-url access
//$_configuration['multiple_access_urls']					= true;
$_configuration['software_name']     = 'Chamilo';
$_configuration['software_url']	     = 'http://www.chamilo.org/';
//Deny the elimination of users
$_configuration['deny_delete_users'] = false;
// Version settings
$_configuration['system_version']    = '{NEW_VERSION}';
$_configuration['system_stable']     = NEW_VERSION_STABLE;

/**
 * Settings to be included as settings_current in future versions
 */
// Hide the main home section for connected users (to show announcements instead)
//$_configuration['hide_home_top_when_connected'] = true;
// Hide the global announcements for non-connected users
//$_configuration['hide_global_announcements_when_not_connected'] = true;
// Use this course as template for all new courses (define course real ID as value)
//$_configuration['course_creation_use_template'] = 14;
// Uncomment the following to prevent all admins to use the "login as" feature
//$_configuration['login_as_forbidden_globally'] = true;
// Add password strength checker
//$_configuration['allow_strength_pass_checker'] = true;
// Enable captcha
//$_configuration['enable_captcha'] = true;
//$_configuration['allow_captcha'] = true;
// Prevent account from logging in for a certain amount of time if captcha is wrong for the specified number of times
//$_configuration['captcha_number_mistakes_to_block_account'] = 5;
// Prevent account from logging in for the specified number of minutes
//$_configuration['captcha_time_to_block'] = 5;//minutes
// Allow DRH role to access all content and users from the sessions he follows
//$_configuration['drh_can_access_all_session_content'] = true;
// Display group's forum in general forum tool
//$_configuration['display_groups_forum_in_general_tool'] = true;
// Boost query on last connection time
//$_configuration['save_user_last_login'] = true;
// Allow course tutors in sessions to add existing students to their session
//$_configuration['allow_tutors_to_assign_students_to_session'] = 'false';
// Allow select the return link in the LP view
//$_configuration['allow_lp_return_link'] = false;
// If true the export link is blocked.
//$_configuration['hide_scorm_export_link'] = false;
// If true the copy link is blocked.
//$_configuration['hide_scorm_copy_link'] = false;
// If true the pdf export link is blocked.
//$_configuration['hide_scorm_pdf_link'] = false;
// Default session days before coach access
//$_configuration['session_days_before_coach_access'] = 0;
// Default session days after coach access
//$_configuration['session_days_after_coach_access'] = 0;
// PDF Logo header located in main/css/xxx/images/pdf_logo_header.png
//$_configuration['pdf_logo_header'] = false;
// Order inscription user list by official_code
//$_configuration['order_user_list_by_official_code'] = false;
// Default course setting "email_alert_manager_on_new_quiz"
//$_configuration['email_alert_manager_on_new_quiz'] = 1;
// If session_stored_in_db is false, an alternative session storage mechanism
// can be used, which allows for a volatile storage in Memcache, and a more
// permanent "backup" storage in the database, every once in a while (see
// frequency). This is generally used in HA clusters configurations
// This requires memcache or memcached and the php5-memcache module to be setup
//$_configuration['session_stored_in_db_as_backup'] = true;
// Define the different memcache servers available
//$_configuration['memcache_server'] = array(
//    0 => array(
//        'host' => 'chamilo8',
//        'port' => '11211',
//    ),
//    1 => array(
//        'host' => 'chamilo9',
//        'port' => '11211',
//    ),
//);
// Define the frequency to which the data must be stored in the database
//$_configuration['session_stored_after_n_times'] = 10;
// Show official code in exercise report list.
//$_configuration['show_official_code_exercise_result_list'] = false;
// One connection per user
//$_configuration['prevent_multiple_simultaneous_login'] = false;
// Hide private courses from course catalog
//$_configuration['course_catalog_hide_private'] = false;
// Display sessions catalog
// 0 = show only courses; 1 = show only sessions; 2 = show courses and sessions
//$_configuration['catalog_show_courses_sessions'] = 0;
// Auto detect language custom pages.
// $_configuration['auto_detect_language_custom_pages'] = true;
// If the database is down this css style will be used to show the errors.
//$_configuration['theme_fallback'] = 'chamilo'; // (main/css/chamilo)
// The default template that will be use in the system.
//$_configuration['default_template'] = 'default'; // (main/template/default)
// Show reduce LP report
//$_configuration['lp_show_reduced_report'] = false;
//Allow session-to-session copy
//$_configuration['allow_session_course_copy_for_teachers'] = true;
// Hide the logout button
//$_configuration['hide_logout_button'] = true;
// Hide fields in the main/user/user.php page
//$_configuration['hide_user_field_from_list'] = array('username');
// Aspell Settings
//$_configuration['aspell_bin'] = '/usr/bin/hunspell';
//$_configuration['aspell_opts'] = '-a -d en_GB -H -i utf-8';
//$_configuration['aspell_temp_dir'] = './';
// Prevent redirecting admin to admin page
//$_configuration['redirect_admin_to_courses_list'] = true;
// Shows the custom course icon instead of the classic green board icon
//$_configuration['course_images_in_courses_list'] = false;
// Which student publication will be taken when connected to the gradebook: first|last
//$_configuration['student_publication_to_take_in_gradebook'] = 'first';
// Show a filter by official code
//$_configuration['certificate_filter_by_official_code'] = false;
// Max quantity of fkceditor allowed in the exercise result page otherwise
// Textareas are used.
//$_configuration['exercise_max_fckeditors_in_page'] = 0;
// Default upload option
//$_configuration['document_if_file_exists_option'] = 'rename'; // overwrite
// Custom name_order_conventions
//$_configuration['name_order_conventions'] = array(
//  'french' => array('format' => 'title last_name first_name',  'sort_by' => 'last_name')
//);
// Shows a warning message that the site use cookies
//$_configuration['chamilo_use_cookie_warning_validation'] = false;
