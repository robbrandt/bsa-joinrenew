<?php

DEFINE("JOINRENEW_PAGE_ID", 2);
//DEFINE("ADMIN_PAGE_ID", 6);
DEFINE("GIFT_MEMBERSHIP_PAGE_ID", 12);
DEFINE("MEMBERSHIP_SECTIONS_FIELD_ID", 9);
DEFINE("FAMILY_SECTIONS_FIELD_ID", 89);


//Join/Renew GiftMembership PriceSet FieldID
DEFINE("JR_GIFTMEMBERSHIP_FIELD_ID", 74);
//GiftMembership Standalone Page GiftMembership PriceSet Field ID
DEFINE("GMSA_GIFTMEMBERSHIP_FIELD_ID", 252);



DEFINE("FAMILYMEMBERSHIP_PAGE_ID", 3);

DEFINE("PSB_CONTACT_ID", 22699);


//Live
DEFINE("JOINRENEW_PRICESET_ID", 5);
DEFINE("JOINRENEW_SECTIONS_PRICESET_ID", 6);
DEFINE("JOINRENEW_AJB_PRICESET_ID", 7);
DEFINE("MEMBERSHIP_FIELD_ID", 8);
DEFINE("MEMBERSHIP_AJB_FIELD_ID", 67);
DEFINE("MEMBERSHIP_AJB_FIELD_OPTION_ID", 143);


require_once 'joinrenew.civix.php';

/**
 * Implementation of hook_civicrm_config
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_config
 */
function joinrenew_civicrm_config(&$config) {
    _joinrenew_civix_civicrm_config($config);
}

/**
 * Implementation of hook_civicrm_xmlMenu
 *
 * @param $files array(string)
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_xmlMenu
 */
function joinrenew_civicrm_xmlMenu(&$files) {
    _joinrenew_civix_civicrm_xmlMenu($files);
}

/**
 * Implementation of hook_civicrm_install
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_install
 */
function joinrenew_civicrm_install() {
    return _joinrenew_civix_civicrm_install();
}

/**
 * Implementation of hook_civicrm_uninstall
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_uninstall
 */
function joinrenew_civicrm_uninstall() {
    return _joinrenew_civix_civicrm_uninstall();
}

/**
 * Implementation of hook_civicrm_enable
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_enable
 */
function joinrenew_civicrm_enable() {
    return _joinrenew_civix_civicrm_enable();
}

/**
 * Implementation of hook_civicrm_disable
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_disable
 */
function joinrenew_civicrm_disable() {
    return _joinrenew_civix_civicrm_disable();
}

/**
 * Implementation of hook_civicrm_upgrade
 *
 * @param $op string, the type of operation being performed; 'check' or 'enqueue'
 * @param $queue CRM_Queue_Queue, (for 'enqueue') the modifiable list of pending up upgrade tasks
 *
 * @return mixed  based on op. for 'check', returns array(boolean) (TRUE if upgrades are pending)
 *                for 'enqueue', returns void
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_upgrade
 */
function joinrenew_civicrm_upgrade($op, CRM_Queue_Queue $queue = NULL) {
    return _joinrenew_civix_civicrm_upgrade($op, $queue);
}

/**
 * Implementation of hook_civicrm_managed
 *
 * Generate a list of entities to create/deactivate/delete when this module
 * is installed, disabled, uninstalled.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_managed
 */
function joinrenew_civicrm_managed(&$entities) {
    return _joinrenew_civix_civicrm_managed($entities);
}

/**
 * Implementation of hook_civicrm_caseTypes
 *
 * Generate a list of case-types
 *
 * Note: This hook only runs in CiviCRM 4.4+.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_caseTypes
 */
function joinrenew_civicrm_caseTypes(&$caseTypes) {
    _joinrenew_civix_civicrm_caseTypes($caseTypes);
}

/**
 * Implementation of hook_civicrm_alterSettingsFolders
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_alterSettingsFolders
 */
function joinrenew_civicrm_alterSettingsFolders(&$metaDataFolders = NULL) {
    _joinrenew_civix_civicrm_alterSettingsFolders($metaDataFolders);
}

/**
 * Implementation of hook_civicrm_tokens
 *
 * http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_tokens
 *
 * This hook is called to allow custom tokens to be defined.
 * Their values will need to be supplied by hook_civicrm_tokenValues.
 *
 * @param $tokens - reference to the associative array of custom
 * tokens that are available to be used in mailings and other
 * contexts. This will be an empty array unless an implementation
 * of hook_civicrm_tokens adds items to it
 *
 */

function joinrenew_civicrm_tokens( &$tokens ) {
    $tokens['FamilyMembership'] = array(
        'FamilyMembership.token' => ts("The Token to include when notifying a family member that they need to update their contact into; used to create relationships")
    );
    $tokens['GiftMemberships'] = array(
        'GiftMemberships.name' => ts("Name of Recipient"),
        'GiftMemberships.coupon' => ts("Coupon Code"),
    );
    $tokens['username'] = array(
        'username.drupal' => 'Drupal username',
    );
}


/**
 * Implementation of hook_civicrm_tokens
 *
 * http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_tokenValues
 *
 * This hook is called to get all the values for the tokens registered.
 * Use it to overwrite or reformat existing token values, or supply the
 * values for custom tokens you have defined in hook_civicrm_tokens.
 *
 *
 * @param $values - array of values, keyed by contact id
 * @param $cids - array of contactIDs that the system needs values for.
 * @param null $job - the job_id
 * @param array $tokens - tokens used in the mailing - use this to check whether a token is being used and avoid fetching data for unneeded tokens
 * @param null $context -  the class name
 */

function joinrenew_civicrm_tokenValues(&$values, $cids, $job = null, $tokens = array(), $context = null) {
    if (array_key_exists("FamilyMembershipToken", $_SESSION)) {
        if (!empty($tokens['FamilyMembership'])) {
            $data = array('FamilyMembership.token' => $_SESSION['FamilyMembershipToken']);
            foreach ($cids as $cid) {
                $values[$cid] = empty($values[$cid]) ? $data : $values[$cid] + $data;
            }
            unset($_SESSION['FamilyMembershipToken']);
        }
    }
    if (array_key_exists("GiftMemberships", $_SESSION)) {
        if (!empty($tokens['GiftMemberships'])) {
            $data = array (
                'GiftMemberships.name' => $_SESSION['GiftMemberships']['name'],
                'GiftMemberships.coupon' => $_SESSION['GiftMemberships']['code'],
            );

            foreach ($cids as $cid) {
                $values[$cid] = empty($values[$cid]) ? $data : $values[$cid] + $data;
            }
        }
    }
    if (!empty($tokens['username'])) {

        civicrm_initialize();
        foreach ($cids as $cid) {
            $params = array(
                'version' => 3,
                'sequential' => 1,
                'contact_id' => $cid,
            );
            $result = civicrm_api('UFMatch', 'get', $params);
            if (!$result['is_error']) {
                $drupalinfo = user_load($result['values'][0]['uf_id']);
                $values[$cid]['username.drupal'] = $drupalinfo->name;
            }
        }

    }
}

/**
 * Implementation of hook_pricesetmap_beforeRelationshipCreate
 *
 * @param $formName - Name of the form being validated, you will typically use this to do different things for different forms.
 * @param $form - The form object passed into postProcess and then to use
 * @param $relationship - The params for the relationship that is about to be created.
 */
function joinrenew_pricesetmap_beforeRelationshipCreate( $formName, &$form, &$relationship ) {
    if ($formName == "CRM_Contribute_Form_Contribution_Confirm" && $form->getVar("_id") == JOINRENEW_PAGE_ID) {
        $relationship['start_date'] = substr($relationship['end_date'], 0, 4)."-01-01";
    }

    if ($formName == "CRM_Contribute_Form_Contribution_Confirm" && ($form->getVar("_id") == FAMILYMEMBERSHIP_PAGE_ID || $form->getVar("_id") == JOINRENEW_PAGE_ID)) {
        //We know this is a Section because it is being sent in from PriceSetMap,
        //for the Auxiliary Family Member, so find the membership and set the start
        //and end date to match the membership
        $contactID = $form->getVar("_contactID");

        $result = civicrm_api3('MembershipType', 'get', array(
            'sequential' => 1,
            'return' => "id,name",
            'relationship_type_id' => array('<>' => ""),
            'is_active' => 1,
        ));

        if ($result['is_error'] == 0 && $result['count'] > 0) {
            $FamilyMembershipTypes = array();
            foreach ($result['values'] as $type) {
                $FamilyMembershipTypes[ $type['id'] ] = $type;
            }

            $dao = new CRM_Member_DAO_Membership();
            $dao->contact_id = $contactID;
            $dao->is_test = 0;
            $dao->find();

            $good_statuses = array(1,2,3,8);

            while($dao->fetch()) {
                if (array_key_exists($dao->membership_type_id, $FamilyMembershipTypes) && in_array($dao->status_id, $good_statuses)) {
                    $year = substr($dao->end_date, 0, 4);
                    $relationship['start_date'] = $year."-01-01";
                    $relationship['end_date'] = $year."-12-31";
                }
            }
        }
    }
}

/**
 * Implementation of hook_civicrm_validateForm
 *
 * http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_validateForm
 *
 * @param $formName - Name of the form being validated, you will typically use this to do different things for different forms.
 * @param $fields -  Array of name value pairs for all 'POST'ed form values
 * @param $files - Array of file properties as sent by PHP POST protocol
 * @param $form - Reference to the civicrm form object. This is useful if you want to retrieve any values that we've constructed in the form
 * @param $errors - Reference to the errors array. All errors will be added to this array
 */
function joinrenew_civicrm_validateForm( $formName, &$fields, &$files, &$form, &$errors ) {

    /********************[ Verify Student Chapter Members have Selected a Chapter ]********************/
    if ($formName == "CRM_Contribute_Form_Contribution_Main" && ($form->getVar('_id') == JOINRENEW_PAGE_ID)) {
        //Error on the Custom Field
        $ChapterID = CRM_Utils_Array::value( 'custom_203', $fields );
        if ( $fields['price_8'] == 191 && !$ChapterID ) {
            $errors['custom_203'] = ts( 'You must select a Student Chapter' );
        }

    }
    //error_log("test");

    /********************[ Make sure that if Gift Memberships are purchased, they give us names and emails ]********************/
    if ($formName == "CRM_Contribute_Form_Contribution_Main" &&
      (($form->getVar('_id') == JOINRENEW_PAGE_ID) || ($form->getVar('_id') == GIFT_MEMBERSHIP_PAGE_ID))) {

        if($form->getVar('_id') == GIFT_MEMBERSHIP_PAGE_ID) {
            $priceFieldName = "price_".GMSA_GIFTMEMBERSHIP_FIELD_ID;
        } else {
            $priceFieldName = "price_".JR_GIFTMEMBERSHIP_FIELD_ID;
        }

        if ($fields[$priceFieldName] > 0) {
            $i = 1;
            while($i <= $fields[$priceFieldName]) {
                if (!$form->_submitValues['GiftMembership'][$i]['email'] || !$form->_submitValues['GiftMembership'][$i]['name']) {
                    $errors[$priceFieldName] = ts( 'You must provide a name and email address for each gift membership' );
                    break;
                }
                $i++;
            }
        }
    }



    //TODO: Validate that if a family membership is selected, they also filled out the family membership fields

    /********************[ Force the Auxiliary Family Member page to allow anon users to complete the page ]********************/

    //error_log("test");

}

/**
 * Implementation of hook_civicrm_buildForm
 *
 * http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_buildForm
 *
 * @param $formName - the name of the form
 * @param $form -  reference to the form object
 */

function joinrenew_civicrm_buildForm( $formName, &$form ) {
    if (($formName == 'CRM_Contribute_Form_Contribution_Main') && ($form->getVar('_id') == JOINRENEW_PAGE_ID)) {

        /******************[ Custom Select Boxes for Donations  ]******************/
        if (array_key_exists("newDonations", $_REQUEST) && $_REQUEST['newDonations'] == 1) {
            CRM_Core_Resources::singleton()->addSetting(array('JoinRenew' => array('ShutterDonations' => true)));
        }


        /******************[ Custom Data for Student Chapter Select Box  ]******************/

        $result = civicrm_api3('Contact', 'get', array(
            'sequential' => 1,
            'contact_sub_type' => "Student_Chapter",
            'return' => "id,display_name",
        ));
        $Chapters = array();

        if ($result['is_error'] == 0 && $result['count'] > 0) {
            foreach($result['values'] as $row) {
                $Chapters[] = array("id" => $row['contact_id'], "text" => $row['display_name']);
            }
        }

        CRM_Core_Resources::singleton()->addSetting(array('JoinRenew' => array('StudentChapters' => $Chapters)));

        //This allows us to manually set the student chapter to avoid a core bug that
        //causes the form to fail to submit when the user has a student chapter selected
        //and doesn't change it. (Present in 4.6.9) - NTL
        $studentChapterId = CRM_Utils_Array::value( 'custom_203_id', $form->_defaultValues, false );
        CRM_Core_Resources::singleton()->addSetting(array('JoinRenew' => array('StudentChapterId' => $studentChapterId)));



        /******************[ AJB Print Settings ]******************/
        $result = civicrm_api3('PriceSet', 'get', array(
            'sequential' => 1,
            'id' => JOINRENEW_AJB_PRICESET_ID,
            'api.PriceField.get' => array('api.PriceFieldValue.get' => array()),
        ));

        if ($result['is_error'] || $result['count'] == 0 || $result['values'][0]['api.PriceField.get']['is_error']) {
            CRM_Core_Resources::singleton()->addSetting(array('JoinRenew' => array('AJB' => array())));
        } else {

            $AJB = array();

            foreach ($result['values'][0]['api.PriceField.get']['values'] as $field) {
                if ($field['api.PriceFieldValue.get']['is_error'] == 0) {
                    $MType = array();
                    foreach($field['api.PriceFieldValue.get']['values'] as $V) {
                        $MType[$V['label']] = $V;
                    }
                    $AJB[$field['label']] = $MType;
                }
            }


            CRM_Core_Resources::singleton()->addSetting(array('JoinRenew' => array('AJB' => $AJB)));
        }

        //Email notes:
        //One way to send simple email ie to staff:
        //CRM_Core_BAO_UFGroup::commonSendMail($contactID, $val);


        /******************[ Load Family Membership Data ]******************/
        $result = civicrm_api3('MembershipType', 'get', array(
            'sequential' => 1,
            'return' => "id,relationship_direction,name,relationship_type_id",
            'relationship_type_id' => array('<>' => ""),
            'is_active' => 1,
        ));

        //Load the price-set id lines that correspond to each membership type
        $type_lookup = array();
        foreach($form->_priceSet['fields'][8]['options'] as $key => $type) {
            $type_lookup[$type['membership_type_id']] = $key;
        }

        if ($result['is_error'] == 0 && $result['count'] > 0) {
            $FamilyMembershipTypes = array();
            $FamilyMembershipTypeKeys = array();
            $FamilyRelationshipTypes = array();
            foreach ($result['values'] as $type) {
                $FamilyMembershipTypes[ $type_lookup[ $type['id'] ] ] = $type;
                $FamilyMembershipTypeKeys[] = $type['id'];
                $FamilyRelationshipTypes[$type['relationship_type_id'][0]] = $type['relationship_direction'][0];
            }

            CRM_Core_Resources::singleton()->addSetting(array('JoinRenew' => array('FamilyMemberships' => $FamilyMembershipTypes)));
        } else {
            CRM_Core_Resources::singleton()->addSetting(array('JoinRenew' => array('FamilyMemberships' => array())));
        }

        //Now check to see if the current user HAS one of these memberships already
        //This doesn't all work, in part because of the inherent
        //problems with selecting a membership if more than
        //one exist in the database. This is a civi problem not a
        //Limitation of the join/renew plugin
        //So for now, we are going to search for family memberships, and
        //If found ASSUME it is the one we are renewing and run with it.
        if ($form->_contactID) {

            //$form->_defaultMemTypeId;
            //$form->_defaultValues['price_8'];


            $result = civicrm_api3('Membership', 'get', array(
                'sequential' => 1,
                'membership_type_id' => array('IN' => $FamilyMembershipTypeKeys),
                'is_test' => 0,
                'contact_id' => $form->_contactID,
            ));

            if ($result['is_error'] == 0 && $result['count'] > 0) {


                //TODO: At some point we should calculate when a family2 member is leaving their family memberships
                //And ask if that is what they arelly want to do. (This requires calculating their actualy membershipID
                //which we cannot currently do.

                $rels = civicrm_api3('Relationship', 'get', array(
                    'sequential' => 1,
                    'relationship_type_id' => array('IN' => array_keys($FamilyRelationshipTypes)),
                    'contact_id_a' => $form->_contactID,
                    'is_active' => 1,
                ));

                if ($rels['is_error'] == 0 && $rels['count'] > 0) {

                    $result = civicrm_api3('Contact', 'get', array(
                        'sequential' => 1,
                        'return' => "display_name,email",
                        'id' => $rels['values'][0]['contact_id_b'],
                    ));

                    if ($result['is_error'] == 0 && $result['count'] > 0) {
                        CRM_Core_Resources::singleton()->addSetting(array('JoinRenew' => array('CFamilyRelationship' => array("name" => $result['values'][0]['display_name'], "email" => $result['values'][0]['email']))));
                    }

                }
            }
        }

        
        /******************[ Get Drupal User name for populating BotanyID ]******************/
        global $user;
        $setting = array('module_name' => array('user_name' => $user->name));
        drupal_add_js($setting, 'setting');

        /******************[ Generic Includes for all settings and hacks ]******************/

        CRM_Core_Resources::singleton()->addScriptFile('org.botany.joinrenew', 'org_botany_joinrenew.js', 10, 'page-footer');
        CRM_Core_Resources::singleton()->addStyleFile('org.botany.joinrenew', 'org_botany_joinrenew.css');
    } else if (($formName == 'CRM_Contribute_Form_Contribution_Confirm') && ($form->getVar('_id') == JOINRENEW_PAGE_ID)) {

    }



    /******************[ Gift Membership Settings ]******************/

    if (($formName == 'CRM_Contribute_Form_Contribution_Main') && (($form->getVar('_id') == JOINRENEW_PAGE_ID) || ($form->getVar('_id') == GIFT_MEMBERSHIP_PAGE_ID))) {

        if (array_key_exists("GiftMembership", $form->_submitValues)) {
            $_SESSION['GiftMembership'] = $form->_submitValues['GiftMembership'];
            CRM_Core_Resources::singleton()->addSetting(array('JoinRenew' => array('GiftMembership' => $form->_submitValues['GiftMembership'])));
        } else if (array_key_exists("GiftMembership", $_SESSION)) {
            //TODO: Make sure we don't need to do some error checking to see
            //that the number of items in the session var matches the amount of items in
            //The submitted values (ie how many they are paying for)
            CRM_Core_Resources::singleton()->addSetting(array('JoinRenew' => array('GiftMembership' => $_SESSION['GiftMembership'])));
        }

        if($form->getVar('_id') == JOINRENEW_PAGE_ID) {
            CRM_Core_Resources::singleton()->addSetting(array('JoinRenew' => array('GiftMembershipFieldId' => JR_GIFTMEMBERSHIP_FIELD_ID)));
        }

        if($form->getVar('_id') == GIFT_MEMBERSHIP_PAGE_ID) {
            CRM_Core_Resources::singleton()->addSetting(array('JoinRenew' => array('GiftMembershipFieldId' => GMSA_GIFTMEMBERSHIP_FIELD_ID)));
            CRM_Core_Resources::singleton()->addStyleFile('org.botany.joinrenew', 'org_botany_joinrenew.css');
        }

        CRM_Core_Resources::singleton()->addScriptFile('org.botany.joinrenew', 'org_botany_gift_memberships.js', 11, 'page-footer');
    }
}

/**
 * Implementation of hook_civicrm_buildAmount:
 *
 * This hook is called when building the amount structure for
 * a Contribution or Event Page. It allows you to modify the
 * set of radio buttons representing amounts for contribution
 * levels and event registration fees.
 *
 * http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_buildAmount
 *
 * @param $pageType - is this a 'contribution', 'event', or 'membership'
 * @param $form -  reference to the form object
 * @param $amount - the amount structure to be displayed
 *
 */
function joinrenew_civicrm_buildAmount( $pageType, &$form, &$amount ) {

    $formID = $form->getVar("_id");

    /******************[ Logic for when to display the emeritus membership type ]******************/

    if ($pageType == "membership" && $formID == JOINRENEW_PAGE_ID) {

        //todo: This is drupal specific, and needs to be refactored to only use civi functions
        if (!user_is_logged_in()) {
            //The user is NOT LOGGED IN, so remove the emeritus membership from the list
            unset($amount[8]['options'][17]);
            unset($amount[8]['options'][18]);
        }
    }
    /******************[ Remove the "free" life membership ]******************/

    if ($pageType == "membership" && $formID == JOINRENEW_PAGE_ID) {
        unset($amount[8]['options'][389]);
    }
}


/**
 * Implmentation of hook_civicrm_postProcess
 *
 * http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_postProcess
 *
 * @param $formName - the name of the form
 * @param $form - reference to the form object
 *
 */
function joinrenew_civicrm_postProcess( $formName, &$form ) {

    $formAction = $form->get('action');
    $pid = $form->getVar("_priceSetId");

    /********************[ Create Student Chapter Relationships ]********************/
    //This creates the relationships for Student Chapters
    if ($formName == "CRM_Contribute_Form_Contribution_Confirm" && $form->getVar("_id") == JOINRENEW_PAGE_ID) {
        if ( property_exists($form, "lineItem") && array_key_exists(191, $form->lineItem[$pid])
          && $form->lineItem[$pid][191]['membership_type_id'] == 34
          && $form->lineItem[$pid][191]['qty'] > 0) {

            $cid = $form->getVar('_contactID');
            $c_id_b = $form->_submitValues['custom_203'];
            $start_year = substr($form->lineItem[$pid][191]['start_date'], -4);
            $end_year = substr($form->lineItem[$pid][191]['end_date'], -4);

            $params = array(
                'sequential' => 1,
                'contact_id_a' => $cid,
                'contact_id_b' => $c_id_b,
                //Print subscription relationship type
                'relationship_type_id' => 27,
                'start_date' => $start_year."-01-01",
                'end_date' => $end_year."-12-31",
            );

            //Create the relationship
            $r = civicrm_api3('Relationship', 'create', $params);


        }
    }

    /********************[ Create PSB in Print Relationship ]********************/
    //This creates the relationships for Subscription to the PSB in Print
    if ($formName == "CRM_Contribute_Form_Contribution_Confirm" && $form->getVar("_id") == JOINRENEW_PAGE_ID) {
        if ( array_key_exists("custom_198", $form->_params)
            && array_key_exists("PSB", $form->_params['custom_198'])
            && $form->_params['custom_198']['PSB'] == 1) {

            $cid = $form->getVar('_contactID');

            $memType = $form->_params['price_8'];
            $endDate = $form->_lineItem[$pid][$memType]['end_date'];
            $year = substr($endDate, -4);

            $params = array(
                'sequential' => 1,
                'contact_id_a' => $cid,
                'contact_id_b' => PSB_CONTACT_ID,
                //Print subscription relationship type
                'relationship_type_id' => 27,
                'start_date' => $year."-01-01",
                'end_date' => $year."-12-31",
            );

            //Create the relationship
            civicrm_api3('Relationship', 'create', $params);


        }
    }


    /********************[ Send Family Membership Notification Emails ]********************/
    //This creates the relationships for Student Chapters
    //die("This is a simple Test");
    if ($formName == "CRM_Contribute_Form_Contribution_Confirm" && $form->getVar("_id") == JOINRENEW_PAGE_ID) {

        //FIRST: Check that they selected a family membership type
        //If they did we need to send out an email to the person in custom_63 <custom_64>
        //Asking them to update their contact information and pay for their sections


        $result = civicrm_api3('MembershipType', 'get', array(
            'sequential' => 1,
            'return' => "id,relationship_direction,name,relationship_type_id",
            'relationship_type_id' => array('<>' => ""),
            'is_active' => 1,
        ));




        $FamilyMembershipTypes = array();
        $FamilyRelationshipTypes = array();

        if ($result['is_error'] == 0 && $result['count'] > 0) {
            foreach ($result['values'] as $type) {
                $FamilyMembershipTypes[ $type['id'] ] = $type;
                $FamilyMembershipTypeKeys[] = $type['id'];
                $FamilyRelationshipTypes[$type['relationship_type_id'][0]] = $type['relationship_direction'][0];
            }
        }


        //Can't find Current Membership ID
        //So when we store the token it should be a hash with contact,MembershipType,RelationshipType

        $membershipType = $form->_lineItem[$pid][ $form->_params['price_8'] ]['membership_type_id'];



        if (array_key_exists($membershipType, $FamilyMembershipTypes)) {
          // die(nl2br(str_replace(" ", "&nbsp;", print_r($form->_params, true))));
            if ( array_key_exists("custom_64", $form->_params) &&  $form->_params['custom_64']) {

                $contactID = $form->getVar('_contactID');
                $relationshipType = $FamilyMembershipTypes[$membershipType]['relationship_type_id'];
                $relationshipDirection = substr($FamilyMembershipTypes[$membershipType]['relationship_direction'], -1);

                $to_name = $form->_params['custom_63'];
                $to_email = $form->_params['custom_64'];


                //Generate and save a token
                $token = md5("FamilyMembership".$contactID.$membershipType . time() );

                //Save the token
                $tokenData = serialize(array("contactID" =>$contactID,
                                             "membership_type_id" => $membershipType,
                                             "relationship_type" => $relationshipType,
                                             "relationship_direction" => $relationshipDirection,
                                             "to_name" => $to_name,
                                             "to_email" => $to_email,
                                             "token" => $token));


                $sql = "INSERT INTO `botany_family_membership_tokens` (`token`, `email`, `token_data`) VALUES (%1, %2, %3)";
                $values = array();
                $values[1] = array($token, "String");
                $values[2] = array($to_email, "String");
                $values[3] = array($tokenData, "String");

                CRM_Core_DAO::executeQuery( $sql, $values);


                //Send email to the secondary family member

                $_SESSION['FamilyMembershipToken'] = $token;

                $sendTemplateParams = array(
                    'messageTemplateID' => 66,
                    'contactId' => $contactID,
                    'isTest' => false,
                    'PDFFilename' => 'FamilyMembership.pdf',
                );

                $sendTemplateParams['from'] = "Heather Cacanindin <hcacanindin@botany.org>";
                $sendTemplateParams['cc'] = "Heather Cacanindin <hcacanindin@botany.org>";
                $sendTemplateParams['toName'] = $to_name;
                $sendTemplateParams['toEmail'] = $to_email;

                //$sendTemplateParams['cc'] = CRM_Utils_Array::value('cc_receipt', $values);
                //$sendTemplateParams['bcc'] = CRM_Utils_Array::value('bcc_receipt', $values);


                list($sent, $subject, $message, $html) = CRM_Core_BAO_MessageTemplate::sendTemplate($sendTemplateParams);
            }

        }
    }

    /********************[ Create Auxiliary Family Member Relationships ]********************/
    if ($formName == "CRM_Contribute_Form_Contribution_Confirm" && $form->getVar("_id") == FAMILYMEMBERSHIP_PAGE_ID) {
        if ( array_key_exists("FamilyMembershipData", $_SESSION)) {

            //Check to see if this user already has this relationship
            $result = civicrm_api3('Relationship', 'get', array(
                'sequential' => 1,
                'contact_id_a' => $form->getVar("_contactID"),
                'contact_id_b' => $_SESSION['FamilyMembershipData']['contactID'],
                'relationship_type_id' => $_SESSION['FamilyMembershipData']['relationship_type'],
                'is_active' => 1,
            ));
            if ($result['is_error'] == 0 && $result['count'] == 0) {

                $result = civicrm_api3('Relationship', 'get', array(
                    'sequential' => 1,
                    'contact_id_b' => $form->getVar("_contactID"),
                    'contact_id_a' => $_SESSION['FamilyMembershipData']['contactID'],
                    'relationship_type_id' => $_SESSION['FamilyMembershipData']['relationship_type'],
                    'is_active' => 1,
                ));
                if ($result['is_error'] == 0 && $result['count'] == 0) {

                    //Figure out which way the relationship should go
                    if ($_SESSION['FamilyMembershipData']['relationship_direction'] == "a") {
                        $CA = $form->getVar("_contactID");
                        $CB = $_SESSION['FamilyMembershipData']['contactID'];
                    } else {
                        $CA = $_SESSION['FamilyMembershipData']['contactID'];
                        $CB = $form->getVar("_contactID");
                    }

                    //create the relationship
                    $params = array(
                        'sequential' => 1,
                        'contact_id_a' => $CA,
                        'contact_id_b' => $CB,
                        'relationship_type_id' => $_SESSION['FamilyMembershipData']['relationship_type'],
                        'start_date' => date("Y-m-d"),
                        //'end_date' => $subscription_year."-12-31",
                    );

                    //Create the relationship
                    $r = civicrm_api3('Relationship', 'create', $params);

                    //If the relationship was created successfully
                    if ($r['is_error'] == 0) {
                        //TODO: Should we disable the token in the database or delete it?
                        $_SESSION['FamilyMembershipData'] = null;
                        unset($_SESSION['FamilyMembershipData']);
                    }

                }
            }
        }
    }


    /********************[ Create Client AJB Relationships ]********************/

    //This block checks to see if the form processed a renewal for a subscription
    //membership type and if the print copy field was chosen
    if ((($formName == "CRM_Member_Form_Membership"  && $formAction == 1) || $formName == "CRM_Member_Form_MembershipRenewal") &&
        $form->_type == "Membership" && $form->_subType == 31) {

        $result = civicrm_api3('Membership', 'get', array(
            'sequential' => 1,
            'id' => $form->getVar('_id'),
            )
        );

        if ($result['values'][0]['custom_77']) {

            //Contact id for the AJB
            $AJB_ID = 5466;

            //To know the subscription year, we need to parse the end_date for the year
            $subscription_year = substr($result['values'][0]['end_date'], 0, 4);

            //Get the Contact ID Being renewed
            $cid = $form->get('cid');

            $params = array(
                'sequential' => 1,
                'contact_id_a' => $cid,
                'contact_id_b' => $AJB_ID,
                //Print subscription relationship type
                'relationship_type_id' => 27,
                'start_date' => $subscription_year."-01-01",
                'end_date' => $subscription_year."-12-31",
            );

            //Create the relationship
           $r = civicrm_api3('Relationship', 'create', $params);
        }
    }


    //$form->_lineItem[5][something]['price_field_id'] == 74
    //$form->_lineItem[5][something]['qty'] = x
}

/**
 * Implmentation of hook_civicrm_post
 *
 * This hook is called after a db write on some core objects.
 * pre and post hooks are useful for developers building more
 * complex applications and need to perform operations before
 * CiviCRM takes action
 *
 * http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_post
 *
 * @param $op - operation being performed with CiviCRM object.
 * @param $objectName
 * @param $objectId - the unique identifier for the object. tagID in case of EntityTag
 * @param $objectRef - the reference to the object if available. For case of EntityTag it is an array of (entityTable, entityIDs)
 *
 */
function joinrenew_civicrm_post( $op, $objectName, $objectId, &$objectRef ) {
    //for Subscriptions
    //Membership: type - No way to see online only vs print
    //LineItem: field 7 value 12

    /********************[ Handle Gift Memberships ]********************/
    if ($op == "create" && $objectName == "LineItem") {

        //Gift Memberships
        //for Giftmembership page: if ($objectRef->price_field_id == 252 && $objectRef->qty > 0) {
        if (($objectRef->price_field_id == JR_GIFTMEMBERSHIP_FIELD_ID || $objectRef->price_field_id == GMSA_GIFTMEMBERSHIP_FIELD_ID) && $objectRef->qty > 0) {
            if (array_key_exists("GiftMembership", $_SESSION)) {
                $i = 1;
                $output = "";
                while($i <= $objectRef->qty) {
                    if (array_key_exists($i, $_SESSION['GiftMembership'])) {
                        $output .= $_SESSION['GiftMembership'][$i]['name'] ."&lt;".$_SESSION['GiftMembership'][$i]['email']."&gt;\n";
                    }
                    $i++;
                }


                $sql = "INSERT INTO `civicrm_value_old_transaction_data_20` (entity_id, gift_membership_details_201) VALUES (".$objectRef->contribution_id.", %1)";
                CRM_Core_DAO::executeQuery( $sql, array(1 => array($output, "String")) );

                $params = array(
                    'id' => $_SESSION['CiviCRM']['userID'],
                    'sequential' => 1,
                    'return' => "display_name",
                );

                $result = civicrm_api3("Contact", "get", $params);

                $name = "";
                if ($result['is_error'] == 0 AND $result['count'] > 0) {
                    $name = $result['values'][0]['display_name'] . " ";
                }

                //Create the code
                $code = uniqid("GM");
                //$count =
                
                $params = array(
                        "code" => $code,
                        "description" => "GM:" . date("Y-m-d") . ":" . $name . ":" . $_SESSION['CiviCRM']['userID'] . ":",
                        "amount" => 100,
                        "amount_type" => 1,
                        "count_max" => $objectRef->qty,
                        //"count_max" => 1,
                        "count_use" => 0,
                        "pricesets" => array(13, 24),
                        //"memberships" => array(1, 23),
                        "memberships" => array(),
                        "is_active" => 1,
                        "filters" => array(),
                        "autodiscount" => array(),
                        "discount_msg_enabled" => 0,
                        "discount_msg" => "",
                        //This is needed for some reason (it tells the discount module to treat these params as arrays)
                        //Stupid design if you ask me, especially since it isn't in the documentation
                        //And I have to hunt through the database object code to figure it out.
                        'multi_valued' => array('pricesets' => "", 'memberships' => ""),
                );

                $result = civicrm_api3("DiscountCode", "create", $params);


                //Send the email
                $_SESSION['GiftMemberships']['code'] = $code;

                $sendTemplateParams = array(
                    'messageTemplateID' => 67,
                    'contactId' => $_SESSION['CiviCRM']['userID'],
                    'isTest' => false,
                    'PDFFilename' => 'GiftMembership.pdf',
                );

                $sendTemplateParams['from'] = "Heather Cacanindin <hcacanindin@botany.org>";
                $sendTemplateParams['cc'] = "Heather Cacanindin <hcacanindin@botany.org>";
                //$sendTemplateParams['cc'] = CRM_Utils_Array::value('cc_receipt', $values);

                $i = 1;
                while($i <= $objectRef->qty) {

                    if (array_key_exists($i, $_SESSION['GiftMembership'])) {
                        $_SESSION['GiftMemberships']['name'] = $_SESSION['GiftMembership'][$i]['name'];
                        $sendTemplateParams['toName'] = $_SESSION['GiftMembership'][$i]['name'];
                        $sendTemplateParams['toEmail'] = $_SESSION['GiftMembership'][$i]['email'];
                        list($sent, $subject, $message, $html) = CRM_Core_BAO_MessageTemplate::sendTemplate($sendTemplateParams);
                    }

                    $i++;
                }

                unset($_SESSION['GiftMembership']);
            }
        }

        //AJB Online Only
        if ($objectRef->price_field_id == 67 && ($objectRef->price_field_value_id == 143 || $objectRef->price_field_value_id == 143)) {
            //todo: Populate whatever field/relationship we need based on purchased lineitems
        }

    }
}


/**
 * Implmentation of hook_civicrm_custom:
 *
 * This hook is called AFTER the db write on a custom table
 *
 * http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_custom
 *
 * @param $op - the type of operation being performed
 * @param $groupID - the custom group ID
 * @param $entityID - the entityID of the row in the custom table
 * @param $params - the parameters that were sent into the calling function
 *
 */
function joinrenew_civicrm_custom( $op, $groupID, $entityID, &$params ) {


    /********************[ Create the CODENUM for new individuals ]********************/
    //TODO: Find a way to do this for clients
    if ($groupID == 16) {

        //Because we have a bunch of dupelicates, we can't have this run
        //on edit because it will give the dups a new codenum that we will have to
        //deal with on dedupe.
        //if ( $op != 'create' && $op != 'edit' ) {
        if ( $op != 'create' ) {
            return;
        }

        $needs_update = false;
        $tableName = CRM_Core_DAO::getFieldValue( 'CRM_Core_DAO_CustomGroup',
            $groupID,
            'table_name' );


        $sql = "SELECT codenum_75 FROM $tableName WHERE entity_id = $entityID";
        $dao = CRM_Core_DAO::executeQuery( $sql, CRM_Core_DAO::$_nullArray );

        if (! $dao->fetch()) {
            $needs_update = true;
        }

        // Value may also be empty. i.e. delete the value in the interface to reset the field.
        if (! $dao->codenum_75) {
            $needs_update = true;
        }

        if ($needs_update) {
            $codenum = date('Ymd');

            $sql = "SELECT COUNT(*) AS `Today` FROM $tableName WHERE codenum_75 LIKE '$codenum%' ";
            $dao = CRM_Core_DAO::executeQuery( $sql, CRM_Core_DAO::$_nullArray );

            if (! $dao->fetch()) {
                $codenum = $codenum . "001";
            } else if (! $dao->Today) {
                $codenum = $codenum . "001";
            } else {
                $codenum = $codenum . sprintf("%03d", ($dao->Today + 1));
            }

            $sql = "UPDATE $tableName SET codenum_75 = $codenum WHERE entity_id = $entityID";
            CRM_Core_DAO::executeQuery( $sql, CRM_Core_DAO::$_nullArray );
        }
    }
}