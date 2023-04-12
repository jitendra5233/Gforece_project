<?php



use Illuminate\Support\Facades\Route;
  
  
use App\Http\Controllers\SendMailController;

/*

|--------------------------------------------------------------------------

| Web Routes

|--------------------------------------------------------------------------

|

| Here is where you can register web routes for your application. These

| routes are loaded by the RouteServiceProvider within a group which

| contains the "web" middleware group. Now create something great!

|

*/



$controller_path = 'App\Http\Controllers';



// Main Page Route



Route::get('/', function () {

    return redirect('/auth/login');

});



Route::get('/dashbord', [

    'uses'          =>  $controller_path . '\dashboard\Analytics@index',

    'middleware'    => 'checkLogin',

])->name('dashboard-analytics');



// layout

Route::get('/layouts/without-menu', $controller_path . '\layouts\WithoutMenu@index')->name('layouts-without-menu');

Route::get('/layouts/without-navbar', $controller_path . '\layouts\WithoutNavbar@index')->name('layouts-without-navbar');

Route::get('/layouts/fluid', $controller_path . '\layouts\Fluid@index')->name('layouts-fluid');

Route::get('/layouts/container', $controller_path . '\layouts\Container@index')->name('layouts-container');

Route::get('/layouts/blank', $controller_path . '\layouts\Blank@index')->name('layouts-blank');



// pages

Route::get('/pages/account-settings-account', $controller_path . '\pages\AccountSettingsAccount@index')->name('pages-account-settings-account');

Route::get('/pages/account-settings-notifications', $controller_path . '\pages\AccountSettingsNotifications@index')->name('pages-account-settings-notifications');

Route::get('/pages/account-settings-connections', $controller_path . '\pages\AccountSettingsConnections@index')->name('pages-account-settings-connections');

Route::get('/pages/misc-error', $controller_path . '\pages\MiscError@index')->name('pages-misc-error');

Route::get('/pages/misc-under-maintenance', $controller_path . '\pages\MiscUnderMaintenance@index')->name('pages-misc-under-maintenance');



// authentication

Route::get('/auth/login',[

    'uses'          => $controller_path . '\authentications\LoginBasic@index',

    // 'middleware'    => 'checkstatus',

])->name('auth-login-basic');



Route::get('/auth/register-basic', $controller_path . '\authentications\RegisterBasic@index')->name('auth-register-basic');

Route::get('/auth/forgot-password', $controller_path . '\authentications\ForgotPasswordBasic@index')->name('auth-reset-password-basic');



// cards

Route::get('/cards/basic', $controller_path . '\cards\CardBasic@index')->name('cards-basic');



// User Interface

Route::get('/ui/accordion', $controller_path . '\user_interface\Accordion@index')->name('ui-accordion');

Route::get('/ui/alerts', $controller_path . '\user_interface\Alerts@index')->name('ui-alerts');

Route::get('/ui/badges', $controller_path . '\user_interface\Badges@index')->name('ui-badges');

Route::get('/ui/buttons', $controller_path . '\user_interface\Buttons@index')->name('ui-buttons');

Route::get('/ui/carousel', $controller_path . '\user_interface\Carousel@index')->name('ui-carousel');

Route::get('/ui/collapse', $controller_path . '\user_interface\Collapse@index')->name('ui-collapse');

Route::get('/ui/dropdowns', $controller_path . '\user_interface\Dropdowns@index')->name('ui-dropdowns');

Route::get('/ui/footer', $controller_path . '\user_interface\Footer@index')->name('ui-footer');

Route::get('/ui/list-groups', $controller_path . '\user_interface\ListGroups@index')->name('ui-list-groups');

Route::get('/ui/modals', $controller_path . '\user_interface\Modals@index')->name('ui-modals');

Route::get('/ui/navbar', $controller_path . '\user_interface\Navbar@index')->name('ui-navbar');

Route::get('/ui/offcanvas', $controller_path . '\user_interface\Offcanvas@index')->name('ui-offcanvas');

Route::get('/ui/pagination-breadcrumbs', $controller_path . '\user_interface\PaginationBreadcrumbs@index')->name('ui-pagination-breadcrumbs');

Route::get('/ui/progress', $controller_path . '\user_interface\Progress@index')->name('ui-progress');

Route::get('/ui/spinners', $controller_path . '\user_interface\Spinners@index')->name('ui-spinners');

Route::get('/ui/tabs-pills', $controller_path . '\user_interface\TabsPills@index')->name('ui-tabs-pills');

Route::get('/ui/toasts', $controller_path . '\user_interface\Toasts@index')->name('ui-toasts');

Route::get('/ui/tooltips-popovers', $controller_path . '\user_interface\TooltipsPopovers@index')->name('ui-tooltips-popovers');

Route::get('/ui/typography', $controller_path . '\user_interface\Typography@index')->name('ui-typography');



// extended ui

Route::get('/extended/ui-perfect-scrollbar', $controller_path . '\extended_ui\PerfectScrollbar@index')->name('extended-ui-perfect-scrollbar');

Route::get('/extended/ui-text-divider', $controller_path . '\extended_ui\TextDivider@index')->name('extended-ui-text-divider');



// icons

Route::get('/icons/boxicons', $controller_path . '\icons\Boxicons@index')->name('icons-boxicons');



// form elements

Route::get('/forms/basic-inputs', $controller_path . '\form_elements\BasicInput@index')->name('forms-basic-inputs');

Route::get('/forms/input-groups', $controller_path . '\form_elements\InputGroups@index')->name('forms-input-groups');



// form layouts

Route::get('/form/layouts-vertical', $controller_path . '\form_layouts\VerticalForm@index')->name('form-layouts-vertical');

Route::get('/form/layouts-horizontal', $controller_path . '\form_layouts\HorizontalForm@index')->name('form-layouts-horizontal');



// tables

Route::get('/tables/basic', $controller_path . '\tables\Basic@index')->name('tables-basic');





// My Routes

Route::post('/post-login', $controller_path . '\authentications\LoginBasic@postLogin')->name('post-login');

Route::get('/logout', $controller_path . '\authentications\LoginBasic@logout')->name('logout');



Route::get('/role-new', ['uses' => $controller_path . '\Account\Role@index','middleware' => 'checkLogin'])->name('role-new');

Route::get('/role-all', $controller_path . '\Account\Role@AllRoleView')->name('role-all');

Route::post('/submit-role', $controller_path . '\Account\Role@Submitrole')->name('submit-role');



Route::get('/user-new', ['uses' => $controller_path . '\Account\User@index','middleware' => 'checkLogin'])->name('user-new');

Route::get('/user-all',['uses' =>  $controller_path . '\Account\User@AllUserView' ,'middleware' => 'checkLogin'])->name('user-all');

Route::post('/submit-user',  $controller_path . '\Account\User@Submituser')->name('submit-user');



// Route::get('/project-all',['uses' =>  $controller_path . '\Project\Project@AllProjectView' ,'middleware' => 'checkLogin'])->name('project-all');

// Route::get('/project-add',['uses' =>  $controller_path . '\Project\Project@projectAdd'  ,'middleware' => 'checkLogin'])->name('project-add');

// Route::post('/submit-project',  $controller_path . '\Project\Project@projectSubmit')->name('submit-project');

// Route::get('/project-view/{id}',['uses' => $controller_path . '\Project\Project@projectView' ,'middleware' => 'checkLogin'])->name('project-view');

// Route::get('/project-sub-add/{id}',['uses' => $controller_path . '\Project\Project@projectSubAdd' ,'middleware' => 'checkLogin'])->name('project-sub-add');

// Route::post('/submit-sub-project', $controller_path . '\Project\Project@projectSubSubmit')->name('submit-sub-project');



// Route::get('/project-sub-view/{pid}/{id}',['uses' => $controller_path . '\Project\Project@projectSubView' ,'middleware' => 'checkLogin'])->name('project-sub-view');

// Route::get('/project-addProperty',['uses' => $controller_path . '\Project\Project@propertyAdd'  ,'middleware' => 'checkLogin'])->name('project-addProperty');

// Route::get('/project-addProperty/{pid}/{id}', ['uses' => $controller_path . '\Project\Project@propertyAdd'  ,'middleware' => 'checkLogin'])->name('project-addProperty');



// Route::post('/submit-add-property',['uses' => $controller_path . '\Project\Project@SubmitAddProperty' ,'middleware' => 'checkLogin'])->name('submit-add-property');

// Route::get('/project-allPropertiesView',['uses' => $controller_path . '\Project\Project@allPropertiesView' ,'middleware' => 'checkLogin'])->name('project-allPropertiesView');

// Route::get('/project-singlePropertiesView/{id}',['uses' => $controller_path . '\Project\Project@singlePropertiesView' ,'middleware' => 'checkLogin'])->name('project-singlePropertiesView');



Route::get('/all-media', ['uses' =>$controller_path . '\Media\Media@index' ,'middleware' => 'checkLogin'])->name('media');

Route::post('/upload-media', ['uses' =>$controller_path . '\Media\Media@submitMedia' ,'middleware' => 'checkLogin'])->name('upload-media');



Route::post('/update-imgDetails',['uses' => $controller_path . '\Media\Media@imgDetails' ,'middleware' => 'checkLogin'])->name('update-imgDetails');



// Route::post('/getSubProjectById',['uses' => $controller_path . '\Project\Project@getSubProjectById' ,'middleware' => 'checkLogin'])->name('getSubProjectById');

// Route::post('/getAllPropetyStatus', ['uses' =>$controller_path . '\Project\Project@getAllPropetyStatus' ,'middleware' => 'checkLogin'])->name('getAllPropetyStatus');

// Route::post('/getAllPropetyFeatures',['uses' =>$controller_path . '\Project\Project@getAllPropetyFeatures' ,'middleware' => 'checkLogin'])->name('getAllPropetyFeatures');



// Route::get('/project-propertyStatus',['uses' => $controller_path . '\status\PropertyStatus@PropertyStatus' ,'middleware' => 'checkLogin'])->name('project-propertyStatus');

// Route::get('/project-inValidFileFormatView',['uses' => $controller_path . '\Project\Project@inValidFileFormatView' ,'middleware' => 'checkLogin'])->name('project-inValidFileFormatView');

// Route::get('/project-bulkSuccess',['uses' => $controller_path . '\Project\Project@bulkSuccess' ,'middleware' => 'checkLogin'])->name('project-bulkSuccess');


// Route::post('/saveNewFeature',['uses' => $controller_path . '\Feature\Feature@saveNewFeature' ,'middleware' => 'checkLogin'])->name('saveNewFeature');

// Route::post('/SavePropertyStatus',['uses' => $controller_path . '\status\PropertyStatus@SavePropertyStatus' ,'middleware' => 'checkLogin'])->name('SavePropertyStatus');

// Route::post('/DeletePropertyStatus',['uses' => $controller_path . '\status\PropertyStatus@DeletePropertyStatus' ,'middleware' => 'checkLogin'])->name('DeletePropertyStatus');



// Route::get('/user-agentTimeSlot',['uses' => $controller_path . '\Account\User@ShowAgentTimeSlot' ,'middleware' => 'checkLogin'])->name('user-agentTimeSlot');

// Route::post('/getAgentTimeSlot',['uses' => $controller_path . '\Account\User@GetAgentTimeSlot' ,'middleware' => 'checkLogin'])->name('getAgentTimeSlot');

// Route::post('/submit-agentTimeSlot',['uses' => $controller_path . '\Account\User@SubmitAgentTimeSlot' ,'middleware' => 'checkLogin'])->name('submit-agentTimeSlot');



// Route::get('/appointment-view',['uses' => $controller_path . '\Appointment\Appointment@Index' ,'middleware' => 'checkLogin'])->name('appointment-view');



// Route::get('/addAppointment',['uses' => $controller_path . '\Appointment\Appointment@addAppointment' ,'middleware' => 'checkLogin'])->name('addAppointment');



// Route::post('/submit-appointment',['uses' => $controller_path . '\Appointment\Appointment@submitAppointment' ,'middleware' => 'checkLogin'])->name('submit-appointment');



// Route::get('/appointment-status',['uses' => $controller_path . '\Appointment\Appointment@appointmentStatus' ,'middleware' => 'checkLogin'])->name('appointment-status');



// Route::post('/SaveAppointmentStatus',['uses' => $controller_path . '\Appointment\Appointment@SaveAppointmentStatus' ,'middleware' => 'checkLogin'])->name('SaveAppointmentStatus');



// Route::post('/updateAppointmentStatus',['uses' => $controller_path . '\Appointment\Appointment@updateAppointmentStatus' ,'middleware' => 'checkLogin'])->name('updateAppointmentStatus');



// Route::post('/deleteAppointmentStatus',['uses' => $controller_path . '\Appointment\Appointment@deleteAppointmentStatus' ,'middleware' => 'checkLogin'])->name('deleteAppointmentStatus');



// Route::get('/appointment-clientList',['uses' => $controller_path . '\Appointment\Appointment@clientsShow' ,'middleware' => 'checkLogin'])->name('appointment-clientList');



// Route::get('/public-holiday',['uses' => $controller_path . '\Holiday\Holiday@Index' ,'middleware' => 'checkLogin'])->name('public-holiday');



// Route::post('/save_holiday',['uses' => $controller_path . '\Holiday\Holiday@addHoliday' ,'middleware' => 'checkLogin'])->name('save_holiday');



// Route::get('/getAllHolidays',['uses' => $controller_path . '\Holiday\Holiday@getAllHolidays' ,'middleware' => 'checkLogin'])->name('getAllHolidays');

Route::get('/View-Role/{id}',['uses' => $controller_path . '\Account\Role@viewRole' ,'middleware' => 'checkLogin'])->name('View-Role');

Route::post('/update-role',['uses' => $controller_path . '\Account\Role@updateRole' ,'middleware' => 'checkLogin'])->name('update-role');

// Route::get('/project-propertyType',['uses' => $controller_path . '\Project\Project@propertyTypeView' ,'middleware' => 'checkLogin'])->name('project-propertyType');

// Route::post('/SavePropertyType',['uses' => $controller_path . '\Project\Project@SavePropertyType' ,'middleware' => 'checkLogin'])->name('SavePropertyType');

// Route::post('/DeletePropertyType',['uses' => $controller_path . '\Project\Project@DeletePropertyType' ,'middleware' => 'checkLogin'])->name('DeletePropertyType');



// Route::get('/callback',['uses' => $controller_path . '\Callback\Callback@Index' ,'middleware' => 'checkLogin'])->name('callback');
// Route::post('/bulkuploadproperty',['uses' => $controller_path . '\Project\Project@bulkuploadproperty' ,'middleware' => 'checkLogin'])->name('bulkuploadproperty');
// Route::get('/project-bulkupload',['uses' => $controller_path . '\Project\Project@BulkUploadView' ,'middleware' => 'checkLogin'])->name('project-bulkupload');


Route::post('/updatehomepage', $controller_path . '\Setting\setting@UpdateHome')->name('setting');

Route::get('/front_book', $controller_path . '\Setting\setting@front_book')->name('front_book');
Route::get('/open_location', $controller_path . '\Setting\setting@open_location')->name('open_location');

// J Routes

Route::get('/profile', $controller_path . '\Profile\Profile@index')->name('profile');
Route::post('/updateprofile',['uses' => $controller_path . '\Profile\Profile@updateprofile' ,'middleware' => 'checkLogin'])->name('updateprofile');
Route::post('/updatepassword',['uses' => $controller_path . '\Profile\Profile@updatepassword' ,'middleware' => 'checkLogin'])->name('updatepassword');
Route::get('/setting', $controller_path . '\Setting\setting@index')->name('setting');
Route::post('/addupdatesetting',['uses' => $controller_path . '\Setting\setting@addupdatesetting' ,'middleware' => 'checkLogin'])->name('addupdatesetting');
Route::get('/Edituser/{id}',['uses' => $controller_path . '\Account\User@Edituser' ,'middleware' => 'checkLogin'])->name('Edituser');
Route::post('/updateuser',['uses' => $controller_path . '\Account\User@updateuser' ,'middleware' => 'checkLogin'])->name('updateuser');
Route::post('/Deleteuser',['uses' => $controller_path . '\Account\User@Deleteuser' ,'middleware' => 'checkLogin'])->name('Deleteuser');
Route::post('/Deleteproject',['uses' => $controller_path . '\Project\Project@Deleteproject' ,'middleware' => 'checkLogin'])->name('Deleteproject');

// Route::get('/Ediproject/{id}',['uses' => $controller_path . '\Project\Project@Ediproject' ,'middleware' => 'checkLogin'])->name('Ediproject');
// Route::post('/updateproject',['uses' => $controller_path . '\Project\Project@updateproject' ,'middleware' => 'checkLogin'])->name('updateproject');
// Route::get('/Editsubproject/{id}',['uses' => $controller_path . '\Project\Project@Editsubproject' ,'middleware' => 'checkLogin'])->name('Editsubproject');
// Route::post('/updatesubproject',['uses' => $controller_path . '\Project\Project@updatesubproject' ,'middleware' => 'checkLogin'])->name('updatesubproject');
// Route::post('/Deletesubprojet',['uses' => $controller_path . '\Project\Project@Deletesubprojet' ,'middleware' => 'checkLogin'])->name('Deletesubprojet');
// Route::get('/propertyEdit/{id}', ['uses' => $controller_path . '\Project\Project@propertyEdit'  ,'middleware' => 'checkLogin'])->name('propertyEdit');
// Route::post('/updateproperty',['uses' => $controller_path . '\Project\Project@updateproperty' ,'middleware' => 'checkLogin'])->name('updateproperty');
// Route::post('/Deleteproperty',['uses' => $controller_path . '\Project\Project@Deleteproperty' ,'middleware' => 'checkLogin'])->name('Deleteproperty');

// Route::post('/AddMedia',['uses' => $controller_path . '\Project\Project@AddMedia' ,'middleware' => 'checkLogin'])->name('AddMedia');

Route::post('/submit-search', $controller_path . '\Search\Search@index')->name('submit-search');

// Route::get('/Getpropertydata/{id}',['uses' => $controller_path . '\Search\Search@Getpropertydata' ,'middleware' => 'checkLogin'])->name('Getpropertydata');
// Route::post('/delete-imgDetails',['uses' => $controller_path . '\Media\Media@deleteimgDetails' ,'middleware' => 'checkLogin'])->name('delete-imgDetails');
// Route::get('/addAppointment/{id}',['uses' => $controller_path . '\Appointment\Appointment@addAppointment' ,'middleware' => 'checkLogin'])->name('addAppointment');
// Route::get('/addmyAppointment',['uses' => $controller_path . '\Appointment\Appointment@addmyAppointment' ,'middleware' => 'checkLogin'])->name('addmyAppointment');
// Route::post('/UpdatePropertyType',['uses' => $controller_path . '\Project\Project@UpdatePropertyType' ,'middleware' => 'checkLogin'])->name('delete-imgDetails');
// Route::get('/export-csv', ['uses' => $controller_path . '\Appointment\Appointment@exportCSV'  ,'middleware' => 'checkLogin'])->name('export-csv');
// Route::get('/export-appoitmentcsv', ['uses' => $controller_path . '\Appointment\Appointment@exportappointmentCSV'  ,'middleware' => 'checkLogin'])->name('export-appoitmentcsv');
// Route::get('/export-propertycsv',['uses' => $controller_path . '\Project\Project@exportpropertyCSV' ,'middleware' => 'checkLogin'])->name('export-propertycsv');
// Route::post('/getuserbyaddress',['uses' => $controller_path . '\Appointment\Appointment@getuserbyaddress' ,'middleware' => 'checkLogin'])->name('getuserbyaddress');
// Route::post('/myremarkdata',['uses' => $controller_path . '\Appointment\Appointment@myremarkdata' ,'middleware' => 'checkLogin'])->name('myremarkdata');
// Route::post('/ManualAppointment',['uses' => $controller_path . '\Appointment\Appointment@ManualAppointment' ,'middleware' => 'checkLogin'])->name('ManualAppointment');
// Route::get('/AddManualappointment',['uses' => $controller_path . '\Appointment\Appointment@AddManualappointment' ,'middleware' => 'checkLogin'])->name('AddManualappointment');
// Route::get('/Getcallbackdata/{id}',['uses' => $controller_path . '\Callback\Callback@Getcallbackdata' ,'middleware' => 'checkLogin'])->name('Getcallbackdata');
// Route::get('/GetAppointment_single_data/{id}',['uses' => $controller_path . '\Appointment\Appointment@GetAppointment_single_data' ,'middleware' => 'checkLogin'])->name('GetAppointment_single_data');
// Route::get('/Add_remark/{id}',['uses' => $controller_path . '\Appointment\Appointment@Add_remark' ,'middleware' => 'checkLogin'])->name('Add_remark');
// Route::post('/Save_remark',['uses' => $controller_path . '\Appointment\Appointment@Save_remark' ,'middleware' => 'checkLogin'])->name('Save_remark');
// Route::post('/AddWish_list',['uses' => $controller_path . '\Project\Project@AddWish_list' ,'middleware' => 'checkLogin'])->name('AddWish_list');
// Route::get('/wishlist',['uses' => $controller_path . '\Project\Project@wishlist' ,'middleware' => 'checkLogin'])->name('wishlist');

Route::get('/GetUser_single_data/{id}',['uses' => $controller_path . '\Account\User@GetUser_single_data' ,'middleware' => 'checkLogin'])->name('GetUser_single_data');
// Route::post('/UpdatePropertyStatus',['uses' => $controller_path . '\status\PropertyStatus@UpdatePropertyStatus' ,'middleware' => 'checkLogin'])->name('UpdatePropertyStatus');
Route::post('/Sendmail', $controller_path . '\authentications\ForgotPasswordBasic@Sendmail')->name('Sendmail');
Route::get('/ChnagePassword', $controller_path . '\authentications\ForgotPasswordBasic@ChnagePassword')->name('ChnagePassword');
Route::post('/UpdatePassword', $controller_path . '\authentications\ForgotPasswordBasic@UpdatePassword')->name('UpdatePassword');
Route::post('/ChnageupdatePassword', $controller_path . '\authentications\ForgotPasswordBasic@ChnageupdatePassword')->name('ChnageupdatePassword');
Route::get('send/mail', [SendMailController::class, 'send_mail'])->name('send_mail');
Route::get('/organization-calendar',['uses' => $controller_path . '\Holiday\Holiday@organization_calendar' ,'middleware' => 'checkLogin'])->name('organization-calendar');
Route::get('/organization', ['uses' => $controller_path . '\Account\Role@index','middleware' => 'checkLogin'])->name('organization');
Route::post('/update-organization_cal',['uses' => $controller_path . '\Holiday\Holiday@updateOrganizationcal' ,'middleware' => 'checkLogin'])->name('update-organization_cal');
Route::get('/pages-privacy', $controller_path . '\Setting\setting@privacy')->name('privacy');
Route::get('/pages-term_condetion', $controller_path . '\Setting\setting@term_condetion')->name('term_condetion');
Route::get('/pages-who_we_are', $controller_path . '\Setting\setting@who_we_are')->name('who_we_are');
Route::post('/updateprivacy', $controller_path . '\Setting\setting@updateprivacy')->name('updateprivacy');
Route::post('/updateterm', $controller_path . '\Setting\setting@updateterm')->name('updateterm');
Route::post('/updatewho', $controller_path . '\Setting\setting@updatewho')->name('updatewho');
// Route::post('/updatewhoweare', $controller_path . '\Setting\setting@updatewhoweare')->name('updatewhoweare');



// gforce
// my routes
Route::get('/addBranch', $controller_path . '\gforce\BranchCon@addBranch')->name('addBranch');
Route::get('/allBranch', $controller_path . '\gforce\BranchCon@allBranch')->name('allBranch');
Route::get('/addPackage', $controller_path . '\gforce\PackageCon@addPackage')->name('addPackage');
Route::get('/editPackage/{id}', $controller_path . '\gforce\PackageCon@editPackage')->name('editPackage');
Route::get('/allPackage', $controller_path . '\gforce\PackageCon@allPackage')->name('allPackage');
Route::post('/submitPackage', $controller_path . '\gforce\PackageCon@submitPackage')->name('submitPackage');
Route::post('/submitPackage', $controller_path . '\gforce\PackageCon@submitPackage')->name('submitPackage');
Route::post('/updatePackage', $controller_path . '\gforce\PackageCon@updatePackage')->name('updatePackage');
Route::get('/viewPackage/{id}', $controller_path . '\gforce\PackageCon@viewPackage')->name('viewPackage');
Route::get('/qrcode', $controller_path . '\gforce\QrCodeController@index')->name('viewPackage');

// Jitendra Routes

//Project Class Module Routes 
Route::get('/projectClassAll',['uses' =>  $controller_path . '\ProjectClass\ProjectClass@projectAllClassView' ,'middleware' => 'checkLogin'])->name('projectClassAll');
Route::get('/projectClassAdd',['uses' =>  $controller_path . '\ProjectClass\ProjectClass@projectClassAdd'  ,'middleware' => 'checkLogin'])->name('projectClassAdd');
Route::post('/submit-ProjectClass',  $controller_path . '\ProjectClass\ProjectClass@projectClassSubmit')->name('submit-ProjectClass');
Route::get('/editClassProject/{id}',['uses' => $controller_path . '\ProjectClass\ProjectClass@editClassProject' ,'middleware' => 'checkLogin'])->name('editClassProject');
Route::post('/updateClassProject',['uses' => $controller_path . '\ProjectClass\ProjectClass@updateClassProject' ,'middleware' => 'checkLogin'])->name('updateClassProject');
Route::post('/deleteProjectClass',['uses' => $controller_path . '\ProjectClass\ProjectClass@deleteProjectClass' ,'middleware' => 'checkLogin'])->name('deleteProjectClass');
Route::get('/projectClassView/{id}',['uses' => $controller_path . '\ProjectClass\ProjectClass@projectClassView' ,'middleware' => 'checkLogin'])->name('projectClassView');

//Student Module Routes
Route::get('/allStudentsView',['uses' => $controller_path . '\Student\Student@index' ,'middleware' => 'checkLogin'])->name('allStudentsView');
Route::get('/getSingleStudent/{id}',['uses' => $controller_path . '\Student\Student@getSingleStudent' ,'middleware' => 'checkLogin'])->name('getSingleStudent');

//Open Class Module Routes
Route::get('/allOpenClassesView',['uses' => $controller_path . '\OpenClass\OpenClass@index' ,'middleware' => 'checkLogin'])->name('allOpenClassesView');
Route::get('/openClassAdd',['uses' =>  $controller_path . '\OpenClass\OpenClass@openClassAdd'  ,'middleware' => 'checkLogin'])->name('openClassAdd');
Route::post('/submit-OpenClass',  $controller_path . '\OpenClass\OpenClass@openClassSubmit')->name('submit-OpenClass');
Route::get('/editOpenClass/{id}',['uses' => $controller_path . '\OpenClass\OpenClass@editOpenClass' ,'middleware' => 'checkLogin'])->name('editOpenClass');
Route::post('/updateOpenClass',['uses' => $controller_path . '\OpenClass\OpenClass@updateOpenClass' ,'middleware' => 'checkLogin'])->name('updateOpenClass');
Route::post('/deleteOpenClass',['uses' => $controller_path . '\OpenClass\OpenClass@deleteOpenClass' ,'middleware' => 'checkLogin'])->name('deleteOpenClass');
Route::get('/openClassView/{id}',['uses' => $controller_path . '\OpenClass\OpenClass@openClassView' ,'middleware' => 'checkLogin'])->name('openClassView');

//Workshop Modules Routes
Route::get('/allWorkshopView',['uses' => $controller_path . '\Workshop\Workshop@index' ,'middleware' => 'checkLogin'])->name('allWorkshopView');
Route::get('/workshopAdd',['uses' =>  $controller_path . '\Workshop\Workshop@create'  ,'middleware' => 'checkLogin'])->name('workshopAdd');
Route::post('/submit-Workshop',  $controller_path . '\Workshop\Workshop@store')->name('submit-Workshop');
Route::get('/editWorkshop/{id}',['uses' => $controller_path . '\Workshop\Workshop@edit' ,'middleware' => 'checkLogin'])->name('editWorkshop');
Route::post('/deleteWorkshop',['uses' => $controller_path . '\Workshop\Workshop@destroy' ,'middleware' => 'checkLogin'])->name('deleteWorkshop');
Route::post('/updateWorkshop',['uses' => $controller_path . '\Workshop\Workshop@update' ,'middleware' => 'checkLogin'])->name('updateWorkshop');
Route::get('/workshopView/{id}',['uses' => $controller_path . '\Workshop\Workshop@workshopView' ,'middleware' => 'checkLogin'])->name('workshopView');

//Trainer Module Routes
Route::get('/allTrainerView',['uses' => $controller_path . '\Trainer\Trainer@index' ,'middleware' => 'checkLogin'])->name('allTrainerView');
Route::get('/trainerAdd',['uses' =>  $controller_path . '\Trainer\Trainer@create'  ,'middleware' => 'checkLogin'])->name('trainerAdd');
Route::post('/submit-Trainer',  $controller_path . '\Trainer\Trainer@store')->name('submit-Trainer');
Route::get('/editTrainer/{id}',['uses' => $controller_path . '\Trainer\Trainer@edit' ,'middleware' => 'checkLogin'])->name('editTrainer');
Route::post('/updateTrainer',['uses' => $controller_path . '\Trainer\Trainer@update' ,'middleware' => 'checkLogin'])->name('updateTrainer');
Route::post('/deleteTrainer',['uses' => $controller_path . '\Trainer\Trainer@destroy' ,'middleware' => 'checkLogin'])->name('deleteTrainer');
Route::get('/trainerView/{id}',['uses' => $controller_path . '\Trainer\Trainer@trainerView' ,'middleware' => 'checkLogin'])->name('trainerView');

//Blog Module Routes

Route::get('/blog-blogcategory', ['uses' => $controller_path . '\Blog\Blog@blogcategory','middleware' => 'checkLogin'])->name('blog-blogcategory');
Route::post('/addblogcategory',['uses' => $controller_path . '\Blog\Blog@addblogcategory' ,'middleware' => 'checkLogin'])->name('addblogcategory');
Route::post('/Deleteblogcategory',['uses' => $controller_path . '\Blog\Blog@Deleteblogcategory' ,'middleware' => 'checkLogin'])->name('Deleteblogcategory');
Route::get('/blog-newblog', ['uses' => $controller_path . '\Blog\Blog@index','middleware' => 'checkLogin'])->name('blog-newblog');
Route::get('/blog-allblogs', ['uses' => $controller_path . '\Blog\Blog@allblogview','middleware' => 'checkLogin'])->name('blog-allblogs');
Route::post('/addnewblog',['uses' => $controller_path . '\Blog\Blog@addnewblog' ,'middleware' => 'checkLogin'])->name('addnewblog');
Route::post('/Deleteblog',['uses' => $controller_path . '\Blog\Blog@Deleteblog' ,'middleware' => 'checkLogin'])->name('Deleteblog');
Route::post('/updateblog',['uses' => $controller_path . '\Blog\Blog@updateblog' ,'middleware' => 'checkLogin'])->name('updateblog');
Route::get('/Editblog/{id}',['uses' => $controller_path . '\Blog\Blog@Editblog' ,'middleware' => 'checkLogin'])->name('Editblog');
Route::get('/blogView/{id}',['uses' => $controller_path . '\Blog\Blog@blogView' ,'middleware' => 'checkLogin'])->name('blogView');
