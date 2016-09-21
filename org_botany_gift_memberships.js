CRM.$(function ($) {
//Add a container for Gift memberships details
  $("div.Gift_Memberships-section").after("<div id='GiftMembershipDetails'></div>");

//This populates the gift membership fields if they are returning to the page
  if (CRM.JoinRenew.GiftMembership) {
    for (i in CRM.JoinRenew.GiftMembership) {
      $("#GiftMembershipDetails").append("<div class='GiftMembership' id='GiftMembership_" + i + "'><label>Gift Membership " + i + " - Email: </label><input size='40' name='GiftMembership[" + i + "][email]' value='" + CRM.JoinRenew.GiftMembership[i].email + "' /><label> - Name: </label><input size='30' name='GiftMembership[" + i + "][name]' value='" + CRM.JoinRenew.GiftMembership[i].name + "' /></div>");
    }
    $("#GiftMembershipDetails .GiftMembership").filter(":odd").addClass("OddGift");
  }

//Todo: Style the form elements


//When the number of gift memberships changes add the required fields
//to collect the needed data to send out the invitation email
  $("#price_" + CRM.JoinRenew.GiftMembershipFieldId).change(function () {
    TotalNeeded = parseInt($(this).val());
    CurrentlyHave = $("#GiftMembershipDetails .GiftMembership").length;

    if (CurrentlyHave < TotalNeeded) {
      var i = CurrentlyHave + 1;
      while (i <= TotalNeeded) {
        $("#GiftMembershipDetails").append("<div class='GiftMembership' id='GiftMembership_" + i + "'><label>Gift Membership " + i + " - Email: </label><input size='40' name='GiftMembership[" + i + "][email]' /><label> - Name: </label><input size='30' name='GiftMembership[" + i + "][name]' /></div>");
        i++;
      }
      $("#GiftMembershipDetails .GiftMembership").filter(":odd").addClass("OddGift");
    } else {
      $("#GiftMembership_" + $(this).val()).nextAll().remove();
    }
  });


  //Move some elements around on the GiftMembership page
  $(".crm-profile-id-60").insertBefore("#priceset");

});