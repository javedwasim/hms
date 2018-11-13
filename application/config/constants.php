<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Display Debug backtrace
|--------------------------------------------------------------------------
|
| If set to TRUE, a backtrace will be displayed along with php errors. If
| error_reporting is disabled, the backtrace will not display, regardless
| of this setting
|
*/
defined('SHOW_DEBUG_BACKTRACE') OR define('SHOW_DEBUG_BACKTRACE', TRUE);

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
defined('FILE_READ_MODE') OR define('FILE_READ_MODE', 0644);
defined('FILE_WRITE_MODE') OR define('FILE_WRITE_MODE', 0666);
defined('DIR_READ_MODE') OR define('DIR_READ_MODE', 0755);
defined('DIR_WRITE_MODE') OR define('DIR_WRITE_MODE', 0755);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/
defined('FOPEN_READ') OR define('FOPEN_READ', 'rb');
defined('FOPEN_READ_WRITE') OR define('FOPEN_READ_WRITE', 'r+b');
defined('FOPEN_WRITE_CREATE_DESTRUCTIVE') OR define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
defined('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE') OR define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
defined('FOPEN_WRITE_CREATE') OR define('FOPEN_WRITE_CREATE', 'ab');
defined('FOPEN_READ_WRITE_CREATE') OR define('FOPEN_READ_WRITE_CREATE', 'a+b');
defined('FOPEN_WRITE_CREATE_STRICT') OR define('FOPEN_WRITE_CREATE_STRICT', 'xb');
defined('FOPEN_READ_WRITE_CREATE_STRICT') OR define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');

/*
|--------------------------------------------------------------------------
| Exit Status Codes
|--------------------------------------------------------------------------
|
| Used to indicate the conditions under which the script is exit()ing.
| While there is no universal standard for error codes, there are some
| broad conventions.  Three such conventions are mentioned below, for
| those who wish to make use of them.  The CodeIgniter defaults were
| chosen for the least overlap with these conventions, while still
| leaving room for others to be defined in future versions and user
| applications.
|
| The three main conventions used for determining exit status codes
| are as follows:
|
|    Standard C/C++ Library (stdlibc):
|       http://www.gnu.org/software/libc/manual/html_node/Exit-Status.html
|       (This link also contains other GNU-specific conventions)
|    BSD sysexits.h:
|       http://www.gsp.com/cgi-bin/man.cgi?section=3&topic=sysexits
|    Bash scripting:
|       http://tldp.org/LDP/abs/html/exitcodes.html
|
*/
defined('EXIT_SUCCESS') OR define('EXIT_SUCCESS', 0); // no errors
defined('EXIT_ERROR') OR define('EXIT_ERROR', 1); // generic error
defined('EXIT_CONFIG') OR define('EXIT_CONFIG', 3); // configuration error
defined('EXIT_UNKNOWN_FILE') OR define('EXIT_UNKNOWN_FILE', 4); // file not found
defined('EXIT_UNKNOWN_CLASS') OR define('EXIT_UNKNOWN_CLASS', 5); // unknown class
defined('EXIT_UNKNOWN_METHOD') OR define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
defined('EXIT_USER_INPUT') OR define('EXIT_USER_INPUT', 7); // invalid user input
defined('EXIT_DATABASE') OR define('EXIT_DATABASE', 8); // database error
defined('EXIT__AUTO_MIN') OR define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
defined('EXIT__AUTO_MAX') OR define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code
defined('SITE_TITLE_TEXT') OR define('SITE_TITLE_TEXT', "HEMS - Department of Neurosurgery &amp; NICU - BVH"); // highest automatically-assigned error code
defined('FULL_ACCESS') OR define('FULL_ACCESS', 1); // highest automatically-assigned error code

defined('ALLOW_USER_TO_ADMIT') OR define('ALLOW_USER_TO_ADMIT', 'allow_user_to_admit');
defined('VIEW_ADMITTED_PATIENTS') OR define('VIEW_ADMITTED_PATIENTS', 'view_admitted_patients');
defined('VIEW_HISTORY_AND_PLAN_CHART') OR define('VIEW_HISTORY_AND_PLAN_CHART', 'view_history_and_plan_chart');
defined('DISCHARGE_PATIENTS') OR define('DISCHARGE_PATIENTS', 'discharge_patients');
defined('CAN_BOOK_OT') OR define('CAN_BOOK_OT', 'can_book_ot');
defined('CAN_VIEW_OT_LIST') OR define('CAN_VIEW_OT_LIST', 'can_view_ot_list');
defined('VIEW_RADIOLOGY_SECTION') OR define('VIEW_RADIOLOGY_SECTION', 'view_radiology_section');
defined('VIEW_WARD_BED_LIST') OR define('VIEW_WARD_BED_LIST', 'view_ward_bed_list');
defined('VIEW_STATISTICS') OR define('VIEW_STATISTICS', 'view_statistics');
defined('VIEW_INVENTORY') OR define('VIEW_INVENTORY', 'view_inventory');
defined('VIEW_ACCOUNTS') OR define('VIEW_ACCOUNTS', 'view_accounts');
defined('VIEW_CONFIGURATIONS') OR define('VIEW_CONFIGURATIONS', 'view_configurations');
defined('VIEW_MASTER_LIST') OR define('VIEW_MASTER_LIST', 'view_master_list');
defined('CAN_UPDATE') OR define('CAN_UPDATE', 'can_update_patient_record');
defined('CAN_UPDATE_HP_CHART') OR define('CAN_UPDATE_HP_CHART', 'can_update_hp_chart');
defined('CAN_REVISIT') OR define('CAN_REVISIT', 'can_revisit');

defined('SITEURL') OR define('SITEURL', 'http://www.thetechsol.com');
defined('COMPANYNAME') OR define('COMPANYNAME', 'TechSol');


