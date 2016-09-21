CRM.$(function ($) {

    //Hook into the change event for the membership type field
    $(".Membership_Type-section select").change(function() {

        //Hide/show the student chapter selector depending on membership type
        if ( $(this).val() == 191 ) {
            $("#editrow-custom_203").slideDown();
            $("#helprow-custom_203").slideDown();
        } else {
            $("#editrow-custom_203").slideUp();
            $("#helprow-custom_203").slideUp();
        }

        //Hide/show the family membership fields depending on membership type
        if (CRM.JoinRenew.FamilyMemberships.hasOwnProperty( $(this).val() )) {
            $("#editrow-custom_63,#editrow-custom_64").slideDown();
        } else {
            $("#editrow-custom_63,#editrow-custom_64").slideUp();
        }

    });


    /*********************[ Custom Hacks ]*********************/
    //These are some basic customizations that were needed for the BSA Join renew page

    //This moves the header profile above the priceset
    $("#priceset").before( $("div.custom_pre_profile-group") );


    /*********************[ Add Radio Buttons to Endowment tab ]*********************/

    var endowmentValues = [
        {name: '$25.00', value: '25'},
        {name: '$50.00', value: '50'},
        {name: '$100.00', value: '100'},
        {name: '$250.00', value: '250'},
        {name: '$500.00', value: '500'},
        {name: '$1000.00', value: '1000'},
        {name: 'I wish to donate at a later time', value: ''},
    ];

    $(".BSA_Endowment-content").prepend("<div id='EndowmentRadios'></div>");
    for(var i in endowmentValues) {
        $("#EndowmentRadios").append("<input type='radio' class='EndowmentRadioValues' name='EndowmentRadioValues' id='EndRadio_" + endowmentValues[i].value + "' value='"+endowmentValues[i].value+"' /> - " +endowmentValues[i].name+ "<br />");

    }
    $(".EndowmentRadioValues").click(function () {
        //Set the value
        $("#price_69").val( $(this).val() );
        //Hide the custom amount box
        $("#EndowmentCustom").slideUp();
        //Force a recalculation of the total price.
        $("#price_69").keyup();
    });
    //Mark the first Radio button as checked by default.
    $(".EndowmentRadioValues").last().prop("checked", true);

    //Add the Custom Amount radio button.
    $("#EndowmentRadios").append("<input type='radio' name='EndowmentRadioValues' id='EndRadio_custom' value='C' /> - Custom Amount<br />");
    $("#EndRadio_custom").click(function() {
        $("#EndowmentCustom").slideDown();
    });

    //Move the endowment box around so that it is in the correct place for the radio buttons
    $("#EndowmentRadios").append("<div id='EndowmentCustom'></div>");
    $("#EndowmentCustom").append( $("#price_69") );
    $("#EndowmentCustom").hide();


    /*********************[ Headers ]*********************/
    //Move the Headers around on the contribution page
    $("div.Botanical_Friends-section").before( $("#GeneralGiftOpportunities") );
    $("div.BSA_Graduate_Student_Research_A-section").before( $("#AwardSupport") );
    $("div.Developmental_And_Structural_St-section").before( $("#StudentAwardFunds") );

    //Group the donation items so that they flow nicely
    $('div.Paleobotanical_Section_Don_Egge-section, div.Education_Outreach_Fund-section, div.Paleobotanical_Section_Don_Egge-section, div.Education_Outreach_Fund-section, div.Botanical_Friends-section, div.PlantingScience_org-section, div.Paleobotanical_Endowment_Fund-section, div.James_M_and_Esther_N_Schopf_Fun-section, div.Human_Diversity_Fund-section').wrapAll('<div class=" clearfix GeneralGiftOpportunities">');
    $('div.Isabel_Cookson_Award_Fund-section, div.BSA_Public_Policy_Award_Fund-section, div.BSA_Graduate_Student_Research_A-section, div.BSA_Undergraduate_Research_Awar-section,div.BSA_Emerging_Leaders_Award-section, div.Genetics_Graduate_Student_Resea-section, div.Paleobotanical_Section_Postdoct-section, div.Herman_Becker_Fund-section, div.C_E_Bessey_Teaching_Award_Fund-section, div.Vernon_Cheadle_Student_Travel_A-section, div.Michael_Cichan_Fund-section, div.Triarch_Botanical_Images_Travel-section, div.Katherine_Esau_Fund-section, div.Donald_Kaplan_Lecture_Fund-section, div.John_S_Karling_Fund-section, div.Margaret_Menzel_Fund-section, div.Maynard_Moseley_Fund-section, div.Winfried_Remy_and_Renata_Remy_F-section, div.Emanuel_D_Rudolph_Award-section, div.A_J_Sharp_Award_Fund-section, div.Grady_L_Webster_Publication_Awa-section, div.Edgar_T_Wherry_Award_Fund-section, div.Marcia_R_Winslow_Student_Travel-section, div.Development_Structural_Section_-section').wrapAll('<div class=" clearfix AwardSupport">');
    $('div.Physiological_Section_Student_T-section, div.Developmental_And_Structural_St-section, div.Ecology_Section_Student_Travel_-section, div.Genetics_Section_Student_Travel-section, div.Mycological_Section_Student_Tra-section, div.Phycological_Section_Student_Tr-section, div.Phytochemical_Section_Student_T-section, div.Pteridological_Section_Student_-section, div.Southeastern_Section_Student_Tr-section').wrapAll('<div class=" clearfix StudentAwardFunds">');

    //This is to move the Student chapter select box into the appropriate place.
    $("div.Membership_Type-section").after("<div id='StudentChapterDetails'></div>");
    $("#StudentChapterDetails").append( $("#editrow-custom_203"));
    $("#StudentChapterDetails").append( $("#helprow-custom_203") );
    $("#editrow-custom_203").hide();
    $("#helprow-custom_203").hide();

    //Set the system to a normal select box with the data we've provided
    $("#custom_203").select2("destroy").select2({data: CRM.JoinRenew.StudentChapters, placeholder: "Select a Chapter", allowClear: true});


    //In 4.6.9 the contact reference field seems to be populated by the name
    //of the contact rahter than the id, this causes an error on form completion
    //if the user already had a student chapter set and didn't change it. (Even if the
    // field is hidden, because the user selected a different membership type) - NTL

    //Manually set the student chapter value if present
    if (CRM.JoinRenew.StudentChapterId) {
        $("#custom_203").select2("val", CRM.JoinRenew.StudentChapterId);
    } else {
        $("#custom_203").select2("val", "");
    }



    //Move the Family Memebership boxes around
    $("div.Membership_Type-section").after("<div id='FamilyMembershipDetails'></div>").append( $("#editrow-custom_63,#editrow-custom_64") );
    $("#editrow-custom_63,#editrow-custom_64").hide();


    //Set the Family Membership fields if they don't already have data and we have it
    if (CRM.JoinRenew.hasOwnProperty( "CFamilyRelationship" )) {
        $("#custom_63").filter(function() { return this.value == ""; }).val(CRM.JoinRenew.CFamilyRelationship.name);
        $("#custom_64").filter(function() { return this.value == ""; }).val(CRM.JoinRenew.CFamilyRelationship.email);
    }


    //Move the discount code box around
    $("#discountcode").closest("table").attr("id", "discountcodecontainer");
    if(CRM.Workflow) {
        $("#discountcodecontainer").hide();
    }


    //This should be last so that it only takes place after we have moved all the fields around
    //Add the Dollar sign to all the custom amount fields
    $("#priceset input.four").not("#price_74").before("<span class='DonationAmountSign'>$ </span>");
    $("#priceset input.four").not("#price_74").after("<span class='DonationAmountSign'>.00</span>");
    $("#priceset input.four").css({"text-align": "center"});




    //This changes the way the membership help div is displayed
    //There is a bug in the discount code module (or so I suspect)
    //that shows the most recent discount code all the time with the membership.
    //We don't want that. So I'm altering the text so as not to show it.
    //TODO: Look into why this is needed and propose a patch to civicdiscount if needed
    if ($("#help strong").length > 0) {
        //$("#help strong").html( $("#help strong").html().replace(/\(.*\)/g, "(Gift Membership)") );
    }
    $("#price_8 option[value='13']").text( $("#price_8 option[value='13']").text().replace(/\(.*\)/g, "(Gift Membership)") );


    //This triggers a recalculation of the prices based on the default membership type (read as: on page load)
    //This is important because when renewing, the previous membership type is the default.
    //And if they don't change it we don't want them paying the wrong price for their sections
    $(".Membership_Type-section select").change();


});



//This is a generic function used to copy the state value from one state to the other
function LoadStateValue(to,from) {
    if (cj("#state_province-"+to+" option").length > 0) {
        cj("#state_province-" + to).select2("val", cj("#state_province-" + from).val() ).trigger("change");
    } else {
        setTimeout(function() {LoadStateValue(to, from)}, 100);
    }
}



//*********************[ Custom Tab Functions ]*********************//

CRM.$("body").on("SimpleWorkflow:Step:Load", function(event, currentStep) {
    if (currentStep.name == "Basic Info") {
        var CopyAddress = function (to, from) {
            var elementsToCopy = ["address_custom_169", "address_custom_170", "street_address", "supplemental_address_1", "city", "postal_code"];
            for (e in elementsToCopy) {
                cj("#" + elementsToCopy[e] + "-" + to).val(cj("#" + elementsToCopy[e] + "-" + from).val());
            }
            if (cj("#country-" + to).val() != cj("#country-" + from).val()) {
                cj("#state_province-" + to + " option").remove();
                cj("#country-" + to).val(cj("#country-" + from).val()).trigger("change");
                setTimeout(function () {
                    LoadStateValue(to, from)
                }, 100);
            } else {
                if (cj("#state_province-" + to).val() != cj("#state_province-" + from).val()) {
                    cj("#state_province-" + to).select2("val", cj("#state_province-" + from).val()).trigger("change");
                }
            }

        };

        cj("#editrow-address_custom_169-5").before("<br /><span id='CopyAddressText'>Copy from Shipping</span>");
        cj("#CopyAddressText").click(function () {
            CopyAddress("5", "10");
        });
        cj("#editrow-street_address-1").before("<br /><span id='CopySAddressText'>Copy from Shipping</span>");
        cj("#CopySAddressText").click(function () {
            CopyAddress("1", "10");
        });
        cj("#editrow-street_address-1").before("<br /><span id='CopyBAddressText'>Copy from Billing</span>");
        cj("#CopyBAddressText").click(function () {
            CopyAddress("1", "5");
        });

        // capture the drupal username and set it to the custom BotanyID field.  Then hide it so it doesn't confuse the member or allow them to change it.
        var user_name = Drupal.settings.module_name.user_name;
        cj("#custom_309").val(user_name);
        cj("#editrow-custom_309").hide();
    }
});



