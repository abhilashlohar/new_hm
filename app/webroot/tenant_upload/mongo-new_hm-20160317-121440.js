
/** accounts_categories indexes **/
db.getCollection("accounts_categories").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** email_requests indexes **/
db.getCollection("email_requests").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** fix_deposits indexes **/
db.getCollection("fix_deposits").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** hm_modules_assigns indexes **/
db.getCollection("hm_modules_assigns").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** import_user_enrollment_records indexes **/
db.getCollection("import_user_enrollment_records").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** module_types indexes **/
db.getCollection("module_types").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** opening_balance_csv_converteds indexes **/
db.getCollection("opening_balance_csv_converteds").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** regular_bill_temps indexes **/
db.getCollection("regular_bill_temps").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** roles indexes **/
db.getCollection("roles").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** supplimentry_bills indexes **/
db.getCollection("supplimentry_bills").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** user_enrollment_csv_converteds indexes **/
db.getCollection("user_enrollment_csv_converteds").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** user_roles indexes **/
db.getCollection("user_roles").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** wings indexes **/
db.getCollection("wings").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** accounts_categories records **/
db.getCollection("accounts_categories").insert({
  "_id": ObjectId("53c50985845a635c0a000000"),
  "auto_id": NumberInt(1),
  "category_name": "Liability",
  "delete_id": NumberInt(0)
});
db.getCollection("accounts_categories").insert({
  "_id": ObjectId("53c50996845a635c0a000001"),
  "auto_id": NumberInt(2),
  "category_name": "Asset",
  "delete_id": NumberInt(0)
});
db.getCollection("accounts_categories").insert({
  "_id": ObjectId("53c509a9845a635c0a000002"),
  "auto_id": NumberInt(3),
  "category_name": "Income",
  "delete_id": NumberInt(0)
});
db.getCollection("accounts_categories").insert({
  "_id": ObjectId("53c509b9845a635c0a000003"),
  "auto_id": NumberInt(4),
  "category_name": "Expenditure ",
  "delete_id": NumberInt(0)
});

/** email_requests records **/
db.getCollection("email_requests").insert({
  "_id": ObjectId("56e91b185f66fb9c0f000054"),
  "e_id": NumberInt(15),
  "to": "yaswant@phppoets.in",
  "from": "Support@housingmatters.in",
  "from_name": "HousingMatters",
  "subject": "Signup",
  "message_web": "<table  align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\n          <tbody>\n\t\t\t<tr>\n                <td>\n                    <table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\">\n                        <tbody>\n\t\t\t\t\t\t\n\t\t\t\t\t\t\t\t<tr>\n\t\t\t\t\t\t\t\t\t<td colspan=\"2\">\n\t\t\t\t\t\t\t\t\t\t<table style=\"border-collapse:collapse\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\n\t\t\t\t\t\t\t\t\t\t<tbody>\n\t\t\t\t\t\t\t\t\t\t<tr><td style=\"line-height:16px\" colspan=\"4\" height=\"16\">&nbsp;</td></tr>\n\t\t\t\t\t\t\t\t\t\t<tr>\n\t\t\t\t\t\t\t\t\t\t<td style=\"height:32;line-height:0px\" align=\"left\" valign=\"middle\" width=\"32\"><a href=\"#150d7894359a47c6_\" style=\"color:#3b5998;text-decoration:none\"><img class=\"CToWUd\" src=\"http://123.63.2.150:8080/new_hm/as/hm/HM-LOGO-small.jpg\" style=\"border:0\" height=\"50\" width=\"50\"></a></td>\n\t\t\t\t\t\t\t\t\t\t<td style=\"display:block;width:15px\" width=\"15\">&nbsp;&nbsp;&nbsp;</td>\n\t\t\t\t\t\t\t\t\t\t<td width=\"100%\"><a href=\"#150d7894359a47c6_\" style=\"color:#3b5998;text-decoration:none;font-family:Helvetica Neue,Helvetica,Lucida Grande,tahoma,verdana,arial,sans-serif;font-size:19px;line-height:32px\"><span style=\"color:#00a0e3\">Housing</span><span style=\"color:#777776\">Matters</span></a></td>\n\t\t\t\t\t\t\t\t\t\t<td align=\"right\"><a href=\"https://www.facebook.com/HousingMatters.co.in\" target=\"_blank\"><img class=\"CToWUd\" src=\"http://123.63.2.150:8080/new_hm/as/hm/SMLogoFB.png\" style=\"max-height:30px;min-height:30px;width:30px;max-width:30px\" height=\"30px\" width=\"30px\"></a>\n\t\t\t\t\t\t\t\t\t\t\t\n\t\t\t\t\t\t\t\t\t\t</td>\n\t\t\t\t\t\t\t\t\t\t</tr>\n\t\t\t\t\t\t\t\t\t\t<tr style=\"border-bottom:solid 1px #e5e5e5\"><td style=\"line-height:16px\" colspan=\"4\" height=\"16\">&nbsp;</td></tr>\n\t\t\t\t\t\t\t\t\t\t</tbody>\n\t\t\t\t\t\t\t\t\t\t</table>\n\t\t\t\t\t\t\t\t\t</td>\n\t\t\t\t\t\t\t\t</tr>\n\t\t\t\t\t\t\t\t\n\t\t\t\t\t\t\t\t\t\n\t\t\t\t\t\t\t\t\n\t\t\t\t\t\t</tbody>\n\t\t\t\t\t</table>\n\t\t\t\t\t\n                    <table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\">\n                        <tbody>\n\t\t\t\t\t\t\n\t\t\t\t\t\t\t\t<tr>\n\t\t\t\t\t\t\t\t\t\t<td style=\"padding:5px;\" width=\"100%\" align=\"left\">\n\t\t\t\t\t\t\t\t\t\t<span style=\"color:rgb(100,100,99)\" align=\"justify\"> Login-Id: yaswant@phppoets.in </span> \n\t\t\t\t\t\t\t\t\t\t</td>\n\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\n\t\t\t\t\t\t\t\t</tr>\n\t\t\t\t\t\t\t\t\n\t\t\t\t\t\t\t\t<tr>\n\t\t\t\t\t\t\t\t\t\t<td style=\"padding:5px;\" width=\"100%\" align=\"left\">\n\t\t\t\t\t\t\t\t\t\t\t<span style=\"color:rgb(100,100,99)\" align=\"justify\"> <p> Password: <b>\n\t\t\t\t\t\t\t\t\t\t\t<a href=\"http://123.63.2.150:8080/new_hm/hms/send_sms_for_verify_mobile?q=54/11606348461176253073\"> Click here </a> for one time verification of your mobile number and Login into HousingMatters for making life simpler for all your housing matters!</b></p>\n\t\t\t\t\t\t\t\t\t\t\t<p>Congratulations your registration request has been successfully approved  \n\t\t\t\t\t\t\t\t\t\t\t</p></span> \n\t\t\t\t\t\t\t\t\t\t</td>\n\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\n\t\t\t\t\t\t\t\t</tr>\n\t\t\t\t\t\t\t\t\n\t\t\t\t\t\t\t\t<tr>\n\t\t\t\t\t\t\t\t\t<td style=\"padding:5px;\" width=\"100%\" align=\"left\">\n\t\t\t\t\t\t\t\t\t\t\t<span style=\"color:rgb(100,100,99)\"> \n\t\t\t\t\t\t\t\t\t\t\t\tThank you.<br/>\n\t\t\t\t\t\t\t\t\t\t\t\tHousingMatters (Support Team)<br/>\n\t\t\t\t\t\t\t\t\t\t\t\twww.housingmatters.in\n\t\t\t\t\t\t\t\t\t\t\t</span>\n\t\t\t\t\t\t\t\t\t</td>\n\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\n\t\t\t\t\t\t\t\t</tr>\n\t\t\t\t\t\n\t\t\t\t\t</table>\n\t\t\t\t\t\n\t\t\t\t</td>\n\t\t\t</tr>\n\n        </tbody>\n</table>",
  "reply": "Support@housingmatters.in",
  "flag": NumberInt(1),
  "modified": ISODate("2016-03-16T08:36:40.0Z"),
  "created": ISODate("2016-03-16T08:36:40.0Z")
});
db.getCollection("email_requests").insert({
  "_id": ObjectId("56e91b185f66fb9c0f000055"),
  "e_id": NumberInt(16),
  "to": "rohitkumarjoshi43@gmail.com",
  "from": "Support@housingmatters.in",
  "from_name": "HousingMatters",
  "subject": "Signup",
  "message_web": "<table  align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\n          <tbody>\n\t\t\t<tr>\n                <td>\n                    <table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\">\n                        <tbody>\n\t\t\t\t\t\t\n\t\t\t\t\t\t\t\t<tr>\n\t\t\t\t\t\t\t\t\t<td colspan=\"2\">\n\t\t\t\t\t\t\t\t\t\t<table style=\"border-collapse:collapse\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\n\t\t\t\t\t\t\t\t\t\t<tbody>\n\t\t\t\t\t\t\t\t\t\t<tr><td style=\"line-height:16px\" colspan=\"4\" height=\"16\">&nbsp;</td></tr>\n\t\t\t\t\t\t\t\t\t\t<tr>\n\t\t\t\t\t\t\t\t\t\t<td style=\"height:32;line-height:0px\" align=\"left\" valign=\"middle\" width=\"32\"><a href=\"#150d7894359a47c6_\" style=\"color:#3b5998;text-decoration:none\"><img class=\"CToWUd\" src=\"http://123.63.2.150:8080/new_hm/as/hm/HM-LOGO-small.jpg\" style=\"border:0\" height=\"50\" width=\"50\"></a></td>\n\t\t\t\t\t\t\t\t\t\t<td style=\"display:block;width:15px\" width=\"15\">&nbsp;&nbsp;&nbsp;</td>\n\t\t\t\t\t\t\t\t\t\t<td width=\"100%\"><a href=\"#150d7894359a47c6_\" style=\"color:#3b5998;text-decoration:none;font-family:Helvetica Neue,Helvetica,Lucida Grande,tahoma,verdana,arial,sans-serif;font-size:19px;line-height:32px\"><span style=\"color:#00a0e3\">Housing</span><span style=\"color:#777776\">Matters</span></a></td>\n\t\t\t\t\t\t\t\t\t\t<td align=\"right\"><a href=\"https://www.facebook.com/HousingMatters.co.in\" target=\"_blank\"><img class=\"CToWUd\" src=\"http://123.63.2.150:8080/new_hm/as/hm/SMLogoFB.png\" style=\"max-height:30px;min-height:30px;width:30px;max-width:30px\" height=\"30px\" width=\"30px\"></a>\n\t\t\t\t\t\t\t\t\t\t\t\n\t\t\t\t\t\t\t\t\t\t</td>\n\t\t\t\t\t\t\t\t\t\t</tr>\n\t\t\t\t\t\t\t\t\t\t<tr style=\"border-bottom:solid 1px #e5e5e5\"><td style=\"line-height:16px\" colspan=\"4\" height=\"16\">&nbsp;</td></tr>\n\t\t\t\t\t\t\t\t\t\t</tbody>\n\t\t\t\t\t\t\t\t\t\t</table>\n\t\t\t\t\t\t\t\t\t</td>\n\t\t\t\t\t\t\t\t</tr>\n\t\t\t\t\t\t\t\t\n\t\t\t\t\t\t\t\t\t\n\t\t\t\t\t\t\t\t\n\t\t\t\t\t\t</tbody>\n\t\t\t\t\t</table>\n\t\t\t\t\t\n                    <table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\">\n                        <tbody>\n\t\t\t\t\t\t\n\t\t\t\t\t\t\t\t<tr>\n\t\t\t\t\t\t\t\t\t\t<td style=\"padding:5px;\" width=\"100%\" align=\"left\">\n\t\t\t\t\t\t\t\t\t\t<span style=\"color:rgb(100,100,99)\" align=\"justify\"> Login-Id: rohitkumarjoshi43@gmail.com </span> \n\t\t\t\t\t\t\t\t\t\t</td>\n\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\n\t\t\t\t\t\t\t\t</tr>\n\t\t\t\t\t\t\t\t\n\t\t\t\t\t\t\t\t<tr>\n\t\t\t\t\t\t\t\t\t\t<td style=\"padding:5px;\" width=\"100%\" align=\"left\">\n\t\t\t\t\t\t\t\t\t\t\t<span style=\"color:rgb(100,100,99)\" align=\"justify\"> <p> Password: <b>\n\t\t\t\t\t\t\t\t\t\t\t<a href=\"http://123.63.2.150:8080/new_hm/hms/send_sms_for_verify_mobile?q=44/11767310251294691783\"> Click here </a> for one time verification of your mobile number and Login into HousingMatters for making life simpler for all your housing matters!</b></p>\n\t\t\t\t\t\t\t\t\t\t\t<p>Congratulations your registration request has been successfully approved  \n\t\t\t\t\t\t\t\t\t\t\t</p></span> \n\t\t\t\t\t\t\t\t\t\t</td>\n\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\n\t\t\t\t\t\t\t\t</tr>\n\t\t\t\t\t\t\t\t\n\t\t\t\t\t\t\t\t<tr>\n\t\t\t\t\t\t\t\t\t<td style=\"padding:5px;\" width=\"100%\" align=\"left\">\n\t\t\t\t\t\t\t\t\t\t\t<span style=\"color:rgb(100,100,99)\"> \n\t\t\t\t\t\t\t\t\t\t\t\tThank you.<br/>\n\t\t\t\t\t\t\t\t\t\t\t\tHousingMatters (Support Team)<br/>\n\t\t\t\t\t\t\t\t\t\t\t\twww.housingmatters.in\n\t\t\t\t\t\t\t\t\t\t\t</span>\n\t\t\t\t\t\t\t\t\t</td>\n\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\n\t\t\t\t\t\t\t\t</tr>\n\t\t\t\t\t\n\t\t\t\t\t</table>\n\t\t\t\t\t\n\t\t\t\t</td>\n\t\t\t</tr>\n\n        </tbody>\n</table>",
  "reply": "Support@housingmatters.in",
  "flag": NumberInt(1),
  "modified": ISODate("2016-03-16T08:36:40.0Z"),
  "created": ISODate("2016-03-16T08:36:40.0Z")
});
db.getCollection("email_requests").insert({
  "_id": ObjectId("56e91b185f66fb9c0f000056"),
  "e_id": NumberInt(17),
  "to": "yashrajrao52@gmail.com",
  "from": "Support@housingmatters.in",
  "from_name": "HousingMatters",
  "subject": "Signup",
  "message_web": "<table  align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\n          <tbody>\n\t\t\t<tr>\n                <td>\n                    <table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\">\n                        <tbody>\n\t\t\t\t\t\t\n\t\t\t\t\t\t\t\t<tr>\n\t\t\t\t\t\t\t\t\t<td colspan=\"2\">\n\t\t\t\t\t\t\t\t\t\t<table style=\"border-collapse:collapse\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\n\t\t\t\t\t\t\t\t\t\t<tbody>\n\t\t\t\t\t\t\t\t\t\t<tr><td style=\"line-height:16px\" colspan=\"4\" height=\"16\">&nbsp;</td></tr>\n\t\t\t\t\t\t\t\t\t\t<tr>\n\t\t\t\t\t\t\t\t\t\t<td style=\"height:32;line-height:0px\" align=\"left\" valign=\"middle\" width=\"32\"><a href=\"#150d7894359a47c6_\" style=\"color:#3b5998;text-decoration:none\"><img class=\"CToWUd\" src=\"http://123.63.2.150:8080/new_hm/as/hm/HM-LOGO-small.jpg\" style=\"border:0\" height=\"50\" width=\"50\"></a></td>\n\t\t\t\t\t\t\t\t\t\t<td style=\"display:block;width:15px\" width=\"15\">&nbsp;&nbsp;&nbsp;</td>\n\t\t\t\t\t\t\t\t\t\t<td width=\"100%\"><a href=\"#150d7894359a47c6_\" style=\"color:#3b5998;text-decoration:none;font-family:Helvetica Neue,Helvetica,Lucida Grande,tahoma,verdana,arial,sans-serif;font-size:19px;line-height:32px\"><span style=\"color:#00a0e3\">Housing</span><span style=\"color:#777776\">Matters</span></a></td>\n\t\t\t\t\t\t\t\t\t\t<td align=\"right\"><a href=\"https://www.facebook.com/HousingMatters.co.in\" target=\"_blank\"><img class=\"CToWUd\" src=\"http://123.63.2.150:8080/new_hm/as/hm/SMLogoFB.png\" style=\"max-height:30px;min-height:30px;width:30px;max-width:30px\" height=\"30px\" width=\"30px\"></a>\n\t\t\t\t\t\t\t\t\t\t\t\n\t\t\t\t\t\t\t\t\t\t</td>\n\t\t\t\t\t\t\t\t\t\t</tr>\n\t\t\t\t\t\t\t\t\t\t<tr style=\"border-bottom:solid 1px #e5e5e5\"><td style=\"line-height:16px\" colspan=\"4\" height=\"16\">&nbsp;</td></tr>\n\t\t\t\t\t\t\t\t\t\t</tbody>\n\t\t\t\t\t\t\t\t\t\t</table>\n\t\t\t\t\t\t\t\t\t</td>\n\t\t\t\t\t\t\t\t</tr>\n\t\t\t\t\t\t\t\t\n\t\t\t\t\t\t\t\t\t\n\t\t\t\t\t\t\t\t\n\t\t\t\t\t\t</tbody>\n\t\t\t\t\t</table>\n\t\t\t\t\t\n                    <table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\">\n                        <tbody>\n\t\t\t\t\t\t\n\t\t\t\t\t\t\t\t<tr>\n\t\t\t\t\t\t\t\t\t\t<td style=\"padding:5px;\" width=\"100%\" align=\"left\">\n\t\t\t\t\t\t\t\t\t\t<span style=\"color:rgb(100,100,99)\" align=\"justify\"> Login-Id: yashrajrao52@gmail.com </span> \n\t\t\t\t\t\t\t\t\t\t</td>\n\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\n\t\t\t\t\t\t\t\t</tr>\n\t\t\t\t\t\t\t\t\n\t\t\t\t\t\t\t\t<tr>\n\t\t\t\t\t\t\t\t\t\t<td style=\"padding:5px;\" width=\"100%\" align=\"left\">\n\t\t\t\t\t\t\t\t\t\t\t<span style=\"color:rgb(100,100,99)\" align=\"justify\"> <p> Password: <b>\n\t\t\t\t\t\t\t\t\t\t\t<a href=\"http://123.63.2.150:8080/new_hm/hms/send_sms_for_verify_mobile?q=54/12440214561338428455\"> Click here </a> for one time verification of your mobile number and Login into HousingMatters for making life simpler for all your housing matters!</b></p>\n\t\t\t\t\t\t\t\t\t\t\t<p>Congratulations your registration request has been successfully approved  \n\t\t\t\t\t\t\t\t\t\t\t</p></span> \n\t\t\t\t\t\t\t\t\t\t</td>\n\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\n\t\t\t\t\t\t\t\t</tr>\n\t\t\t\t\t\t\t\t\n\t\t\t\t\t\t\t\t<tr>\n\t\t\t\t\t\t\t\t\t<td style=\"padding:5px;\" width=\"100%\" align=\"left\">\n\t\t\t\t\t\t\t\t\t\t\t<span style=\"color:rgb(100,100,99)\"> \n\t\t\t\t\t\t\t\t\t\t\t\tThank you.<br/>\n\t\t\t\t\t\t\t\t\t\t\t\tHousingMatters (Support Team)<br/>\n\t\t\t\t\t\t\t\t\t\t\t\twww.housingmatters.in\n\t\t\t\t\t\t\t\t\t\t\t</span>\n\t\t\t\t\t\t\t\t\t</td>\n\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\n\t\t\t\t\t\t\t\t</tr>\n\t\t\t\t\t\n\t\t\t\t\t</table>\n\t\t\t\t\t\n\t\t\t\t</td>\n\t\t\t</tr>\n\n        </tbody>\n</table>",
  "reply": "Support@housingmatters.in",
  "flag": NumberInt(1),
  "modified": ISODate("2016-03-16T08:36:40.0Z"),
  "created": ISODate("2016-03-16T08:36:40.0Z")
});
db.getCollection("email_requests").insert({
  "_id": ObjectId("56e91b185f66fb9c0f000057"),
  "e_id": NumberInt(18),
  "to": "abhilashlohar01@gmail.com",
  "from": "Support@housingmatters.in",
  "from_name": "HousingMatters",
  "subject": "Signup",
  "message_web": "<table  align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\n          <tbody>\n\t\t\t<tr>\n                <td>\n                    <table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\">\n                        <tbody>\n\t\t\t\t\t\t\n\t\t\t\t\t\t\t\t<tr>\n\t\t\t\t\t\t\t\t\t<td colspan=\"2\">\n\t\t\t\t\t\t\t\t\t\t<table style=\"border-collapse:collapse\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\n\t\t\t\t\t\t\t\t\t\t<tbody>\n\t\t\t\t\t\t\t\t\t\t<tr><td style=\"line-height:16px\" colspan=\"4\" height=\"16\">&nbsp;</td></tr>\n\t\t\t\t\t\t\t\t\t\t<tr>\n\t\t\t\t\t\t\t\t\t\t<td style=\"height:32;line-height:0px\" align=\"left\" valign=\"middle\" width=\"32\"><a href=\"#150d7894359a47c6_\" style=\"color:#3b5998;text-decoration:none\"><img class=\"CToWUd\" src=\"http://123.63.2.150:8080/new_hm/as/hm/HM-LOGO-small.jpg\" style=\"border:0\" height=\"50\" width=\"50\"></a></td>\n\t\t\t\t\t\t\t\t\t\t<td style=\"display:block;width:15px\" width=\"15\">&nbsp;&nbsp;&nbsp;</td>\n\t\t\t\t\t\t\t\t\t\t<td width=\"100%\"><a href=\"#150d7894359a47c6_\" style=\"color:#3b5998;text-decoration:none;font-family:Helvetica Neue,Helvetica,Lucida Grande,tahoma,verdana,arial,sans-serif;font-size:19px;line-height:32px\"><span style=\"color:#00a0e3\">Housing</span><span style=\"color:#777776\">Matters</span></a></td>\n\t\t\t\t\t\t\t\t\t\t<td align=\"right\"><a href=\"https://www.facebook.com/HousingMatters.co.in\" target=\"_blank\"><img class=\"CToWUd\" src=\"http://123.63.2.150:8080/new_hm/as/hm/SMLogoFB.png\" style=\"max-height:30px;min-height:30px;width:30px;max-width:30px\" height=\"30px\" width=\"30px\"></a>\n\t\t\t\t\t\t\t\t\t\t\t\n\t\t\t\t\t\t\t\t\t\t</td>\n\t\t\t\t\t\t\t\t\t\t</tr>\n\t\t\t\t\t\t\t\t\t\t<tr style=\"border-bottom:solid 1px #e5e5e5\"><td style=\"line-height:16px\" colspan=\"4\" height=\"16\">&nbsp;</td></tr>\n\t\t\t\t\t\t\t\t\t\t</tbody>\n\t\t\t\t\t\t\t\t\t\t</table>\n\t\t\t\t\t\t\t\t\t</td>\n\t\t\t\t\t\t\t\t</tr>\n\t\t\t\t\t\t\t\t\n\t\t\t\t\t\t\t\t\t\n\t\t\t\t\t\t\t\t\n\t\t\t\t\t\t</tbody>\n\t\t\t\t\t</table>\n\t\t\t\t\t\n                    <table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\">\n                        <tbody>\n\t\t\t\t\t\t\n\t\t\t\t\t\t\t\t<tr>\n\t\t\t\t\t\t\t\t\t\t<td style=\"padding:5px;\" width=\"100%\" align=\"left\">\n\t\t\t\t\t\t\t\t\t\t<span style=\"color:rgb(100,100,99)\" align=\"justify\"> Login-Id: abhilashlohar01@gmail.com </span> \n\t\t\t\t\t\t\t\t\t\t</td>\n\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\n\t\t\t\t\t\t\t\t</tr>\n\t\t\t\t\t\t\t\t\n\t\t\t\t\t\t\t\t<tr>\n\t\t\t\t\t\t\t\t\t\t<td style=\"padding:5px;\" width=\"100%\" align=\"left\">\n\t\t\t\t\t\t\t\t\t\t\t<span style=\"color:rgb(100,100,99)\" align=\"justify\"> <p> Password: <b>\n\t\t\t\t\t\t\t\t\t\t\t<a href=\"http://123.63.2.150:8080/new_hm/hms/send_sms_for_verify_mobile?q=44x2z2/11907251281283812382\"> Click here </a> for one time verification of your mobile number and Login into HousingMatters for making life simpler for all your housing matters!</b></p>\n\t\t\t\t\t\t\t\t\t\t\t<p>Congratulations your registration request has been successfully approved  \n\t\t\t\t\t\t\t\t\t\t\t</p></span> \n\t\t\t\t\t\t\t\t\t\t</td>\n\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\n\t\t\t\t\t\t\t\t</tr>\n\t\t\t\t\t\t\t\t\n\t\t\t\t\t\t\t\t<tr>\n\t\t\t\t\t\t\t\t\t<td style=\"padding:5px;\" width=\"100%\" align=\"left\">\n\t\t\t\t\t\t\t\t\t\t\t<span style=\"color:rgb(100,100,99)\"> \n\t\t\t\t\t\t\t\t\t\t\t\tThank you.<br/>\n\t\t\t\t\t\t\t\t\t\t\t\tHousingMatters (Support Team)<br/>\n\t\t\t\t\t\t\t\t\t\t\t\twww.housingmatters.in\n\t\t\t\t\t\t\t\t\t\t\t</span>\n\t\t\t\t\t\t\t\t\t</td>\n\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\n\t\t\t\t\t\t\t\t</tr>\n\t\t\t\t\t\n\t\t\t\t\t</table>\n\t\t\t\t\t\n\t\t\t\t</td>\n\t\t\t</tr>\n\n        </tbody>\n</table>",
  "reply": "Support@housingmatters.in",
  "flag": NumberInt(1),
  "modified": ISODate("2016-03-16T08:36:40.0Z"),
  "created": ISODate("2016-03-16T08:36:40.0Z")
});
db.getCollection("email_requests").insert({
  "_id": ObjectId("56e91b185f66fb9c0f000058"),
  "e_id": NumberInt(19),
  "to": "admin@housingmatters.in",
  "from": "Support@housingmatters.in",
  "from_name": "HousingMatters",
  "subject": "New Society  Set up in HousingMatters:   [Riddhi-Siddhi Apartment]",
  "message_web": "<table  align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\n          <tbody>\n\t\t\t<tr>\n                <td>\n                    <table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\">\n                        <tbody>\n\t\t\t\t\t\t\n\t\t\t\t\t\t\t\t<tr>\n\t\t\t\t\t\t\t\t\t<td colspan=\"2\">\n\t\t\t\t\t\t\t\t\t\t<table style=\"border-collapse:collapse\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\n\t\t\t\t\t\t\t\t\t\t<tbody>\n\t\t\t\t\t\t\t\t\t\t<tr><td style=\"line-height:16px\" colspan=\"4\" height=\"16\">&nbsp;</td></tr>\n\t\t\t\t\t\t\t\t\t\t<tr>\n\t\t\t\t\t\t\t\t\t\t<td style=\"height:32;line-height:0px\" align=\"left\" valign=\"middle\" width=\"32\"><a href=\"#150d7894359a47c6_\" style=\"color:#3b5998;text-decoration:none\"><img class=\"CToWUd\" src=\"http://123.63.2.150:8080/new_hm/as/hm/HM-LOGO-small.jpg\" style=\"border:0\" height=\"50\" width=\"50\"></a></td>\n\t\t\t\t\t\t\t\t\t\t<td style=\"display:block;width:15px\" width=\"15\">&nbsp;&nbsp;&nbsp;</td>\n\t\t\t\t\t\t\t\t\t\t<td width=\"100%\"><a href=\"#150d7894359a47c6_\" style=\"color:#3b5998;text-decoration:none;font-family:Helvetica Neue,Helvetica,Lucida Grande,tahoma,verdana,arial,sans-serif;font-size:19px;line-height:32px\"><span style=\"color:#00a0e3\">Housing</span><span style=\"color:#777776\">Matters</span></a></td>\n\t\t\t\t\t\t\t\t\t\t<td align=\"right\"><a href=\"https://www.facebook.com/HousingMatters.co.in\" target=\"_blank\"><img class=\"CToWUd\" src=\"http://123.63.2.150:8080/new_hm/as/hm/SMLogoFB.png\" style=\"max-height:30px;min-height:30px;width:30px;max-width:30px\" height=\"30px\" width=\"30px\"></a>\n\t\t\t\t\t\t\t\t\t\t\t\n\t\t\t\t\t\t\t\t\t\t</td>\n\t\t\t\t\t\t\t\t\t\t</tr>\n\t\t\t\t\t\t\t\t\t\t<tr style=\"border-bottom:solid 1px #e5e5e5\"><td style=\"line-height:16px\" colspan=\"4\" height=\"16\">&nbsp;</td></tr>\n\t\t\t\t\t\t\t\t\t\t</tbody>\n\t\t\t\t\t\t\t\t\t\t</table>\n\t\t\t\t\t\t\t\t\t</td>\n\t\t\t\t\t\t\t\t</tr>\n\t\t\t\t\t\t\t\t\n\t\t\t\t\t\t\t\t\t\n\t\t\t\t\t\t\t\t\n\t\t\t\t\t\t</tbody>\n\t\t\t\t\t</table>\n\t\t\t\t\t\n                    <table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\">\n                        <tbody>\n\t\t\t\t\t\t\n\t\t\t\t\t\t\t\t<tr>\n\t\t\t\t\t\t\t\t\t\t<td style=\"padding:5px;\" width=\"100%\" align=\"left\">\n\t\t\t\t\t\t\t\t\t\t<span style=\"color:rgb(100,100,99)\" align=\"justify\"> <p align=\"justify\"> New Request for Society registration into HousingMatters. Kindly approve the request. </p> </span> \n\t\t\t\t\t\t\t\t\t\t</td>\n\t\t\t\t\t\t\t\t\n\t\t\t\t\t\t\t\t\n\t\t\t\t\t\t\t\t</tr>\n\t\t\t\t\t\t\t\t\n\t\t\t\t\t\t\t\t<tr>\n\t\t\t\t\t\t\t\t\t<td style=\"padding:5px;\" width=\"100%\" align=\"left\">\n\t\t\t\t\t\t\t\t\t\t\t<span style=\"color:rgb(100,100,99)\"> \n\t\t\t\t\t\t\t\t\t\t\t\tThank you.<br/>\n\t\t\t\t\t\t\t\t\t\t\t\tHousingMatters (Support Team)<br/>\n\t\t\t\t\t\t\t\t\t\t\t\twww.housingmatters.in\n\t\t\t\t\t\t\t\t\t\t\t</span>\n\t\t\t\t\t\t\t\t\t</td>\n\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\n\t\t\t\t\t\t\t\t</tr>\n\t\t\t\t\t\n\t\t\t\t\t</table>\n\t\t\t\t\t\n\t\t\t\t</td>\n\t\t\t</tr>\n\n        </tbody>\n</table>",
  "reply": "support@housingmatters.in",
  "flag": NumberInt(1),
  "modified": ISODate("2016-03-16T08:36:40.0Z"),
  "created": ISODate("2016-03-16T08:36:40.0Z")
});
db.getCollection("email_requests").insert({
  "_id": ObjectId("56e91b185f66fb9c0f00005a"),
  "e_id": NumberInt(20),
  "to": "abhilashlohar01@outlook.com",
  "from": "Support@housingmatters.in",
  "from_name": "HousingMatters",
  "subject": "Signup",
  "message_web": "<table  align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\n          <tbody>\n\t\t\t<tr>\n                <td>\n                    <table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\">\n                        <tbody>\n\t\t\t\t\t\t\n\t\t\t\t\t\t\t\t<tr>\n\t\t\t\t\t\t\t\t\t<td colspan=\"2\">\n\t\t\t\t\t\t\t\t\t\t<table style=\"border-collapse:collapse\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\n\t\t\t\t\t\t\t\t\t\t<tbody>\n\t\t\t\t\t\t\t\t\t\t<tr><td style=\"line-height:16px\" colspan=\"4\" height=\"16\">&nbsp;</td></tr>\n\t\t\t\t\t\t\t\t\t\t<tr>\n\t\t\t\t\t\t\t\t\t\t<td style=\"height:32;line-height:0px\" align=\"left\" valign=\"middle\" width=\"32\"><a href=\"#150d7894359a47c6_\" style=\"color:#3b5998;text-decoration:none\"><img class=\"CToWUd\" src=\"http://123.63.2.150:8080/new_hm/as/hm/HM-LOGO-small.jpg\" style=\"border:0\" height=\"50\" width=\"50\"></a></td>\n\t\t\t\t\t\t\t\t\t\t<td style=\"display:block;width:15px\" width=\"15\">&nbsp;&nbsp;&nbsp;</td>\n\t\t\t\t\t\t\t\t\t\t<td width=\"100%\"><a href=\"#150d7894359a47c6_\" style=\"color:#3b5998;text-decoration:none;font-family:Helvetica Neue,Helvetica,Lucida Grande,tahoma,verdana,arial,sans-serif;font-size:19px;line-height:32px\"><span style=\"color:#00a0e3\">Housing</span><span style=\"color:#777776\">Matters</span></a></td>\n\t\t\t\t\t\t\t\t\t\t<td align=\"right\"><a href=\"https://www.facebook.com/HousingMatters.co.in\" target=\"_blank\"><img class=\"CToWUd\" src=\"http://123.63.2.150:8080/new_hm/as/hm/SMLogoFB.png\" style=\"max-height:30px;min-height:30px;width:30px;max-width:30px\" height=\"30px\" width=\"30px\"></a>\n\t\t\t\t\t\t\t\t\t\t\t\n\t\t\t\t\t\t\t\t\t\t</td>\n\t\t\t\t\t\t\t\t\t\t</tr>\n\t\t\t\t\t\t\t\t\t\t<tr style=\"border-bottom:solid 1px #e5e5e5\"><td style=\"line-height:16px\" colspan=\"4\" height=\"16\">&nbsp;</td></tr>\n\t\t\t\t\t\t\t\t\t\t</tbody>\n\t\t\t\t\t\t\t\t\t\t</table>\n\t\t\t\t\t\t\t\t\t</td>\n\t\t\t\t\t\t\t\t</tr>\n\t\t\t\t\t\t\t\t\n\t\t\t\t\t\t\t\t\t\n\t\t\t\t\t\t\t\t\n\t\t\t\t\t\t</tbody>\n\t\t\t\t\t</table>\n\t\t\t\t\t\n                    <table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\">\n                        <tbody>\n\t\t\t\t\t\t\n\t\t\t\t\t\t\t\t<tr>\n\t\t\t\t\t\t\t\t\t\t<td style=\"padding:5px;\" width=\"100%\" align=\"left\">\n\t\t\t\t\t\t\t\t\t\t<span style=\"color:rgb(100,100,99)\" align=\"justify\"> Login-Id: abhilashlohar01@outlook.com </span> \n\t\t\t\t\t\t\t\t\t\t</td>\n\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\n\t\t\t\t\t\t\t\t</tr>\n\t\t\t\t\t\t\t\t\n\t\t\t\t\t\t\t\t<tr>\n\t\t\t\t\t\t\t\t\t\t<td style=\"padding:5px;\" width=\"100%\" align=\"left\">\n\t\t\t\t\t\t\t\t\t\t\t<span style=\"color:rgb(100,100,99)\" align=\"justify\"> <p> Password: <b>\n\t\t\t\t\t\t\t\t\t\t\t<a href=\"http://123.63.2.150:8080/new_hm/hms/send_sms_for_verify_mobile?q=64x203/12644841171379578383\"> Click here </a> for one time verification of your mobile number and Login into HousingMatters for making life simpler for all your housing matters!</b></p>\n\t\t\t\t\t\t\t\t\t\t\t<p>Congratulations your registration request has been successfully approved  \n\t\t\t\t\t\t\t\t\t\t\t</p></span> \n\t\t\t\t\t\t\t\t\t\t</td>\n\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\n\t\t\t\t\t\t\t\t</tr>\n\t\t\t\t\t\t\t\t\n\t\t\t\t\t\t\t\t<tr>\n\t\t\t\t\t\t\t\t\t<td style=\"padding:5px;\" width=\"100%\" align=\"left\">\n\t\t\t\t\t\t\t\t\t\t\t<span style=\"color:rgb(100,100,99)\"> \n\t\t\t\t\t\t\t\t\t\t\t\tThank you.<br/>\n\t\t\t\t\t\t\t\t\t\t\t\tHousingMatters (Support Team)<br/>\n\t\t\t\t\t\t\t\t\t\t\t\twww.housingmatters.in\n\t\t\t\t\t\t\t\t\t\t\t</span>\n\t\t\t\t\t\t\t\t\t</td>\n\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\n\t\t\t\t\t\t\t\t</tr>\n\t\t\t\t\t\n\t\t\t\t\t</table>\n\t\t\t\t\t\n\t\t\t\t</td>\n\t\t\t</tr>\n\n        </tbody>\n</table>",
  "reply": "Support@housingmatters.in",
  "flag": NumberInt(1),
  "modified": ISODate("2016-03-16T08:36:40.0Z"),
  "created": ISODate("2016-03-16T08:36:40.0Z")
});
db.getCollection("email_requests").insert({
  "_id": ObjectId("56ea74005f66fbc80e000004"),
  "e_id": NumberInt(23),
  "to": "nikhileshvyas@yahoo.com",
  "from": "Support@housingmatters.in",
  "from_name": "HousingMatters",
  "subject": "Signup",
  "message_web": "<table  align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\n          <tbody>\n\t\t\t<tr>\n                <td>\n                    <table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\">\n                        <tbody>\n\t\t\t\t\t\t\n\t\t\t\t\t\t\t\t<tr>\n\t\t\t\t\t\t\t\t\t<td colspan=\"2\">\n\t\t\t\t\t\t\t\t\t\t<table style=\"border-collapse:collapse\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\n\t\t\t\t\t\t\t\t\t\t<tbody>\n\t\t\t\t\t\t\t\t\t\t<tr><td style=\"line-height:16px\" colspan=\"4\" height=\"16\">&nbsp;</td></tr>\n\t\t\t\t\t\t\t\t\t\t<tr>\n\t\t\t\t\t\t\t\t\t\t<td style=\"height:32;line-height:0px\" align=\"left\" valign=\"middle\" width=\"32\"><a href=\"#150d7894359a47c6_\" style=\"color:#3b5998;text-decoration:none\"><img class=\"CToWUd\" src=\"http://123.63.2.150:8080/new_hm/as/hm/HM-LOGO-small.jpg\" style=\"border:0\" height=\"50\" width=\"50\"></a></td>\n\t\t\t\t\t\t\t\t\t\t<td style=\"display:block;width:15px\" width=\"15\">&nbsp;&nbsp;&nbsp;</td>\n\t\t\t\t\t\t\t\t\t\t<td width=\"100%\"><a href=\"#150d7894359a47c6_\" style=\"color:#3b5998;text-decoration:none;font-family:Helvetica Neue,Helvetica,Lucida Grande,tahoma,verdana,arial,sans-serif;font-size:19px;line-height:32px\"><span style=\"color:#00a0e3\">Housing</span><span style=\"color:#777776\">Matters</span></a></td>\n\t\t\t\t\t\t\t\t\t\t<td align=\"right\"><a href=\"https://www.facebook.com/HousingMatters.co.in\" target=\"_blank\"><img class=\"CToWUd\" src=\"http://123.63.2.150:8080/new_hm/as/hm/SMLogoFB.png\" style=\"max-height:30px;min-height:30px;width:30px;max-width:30px\" height=\"30px\" width=\"30px\"></a>\n\t\t\t\t\t\t\t\t\t\t\t\n\t\t\t\t\t\t\t\t\t\t</td>\n\t\t\t\t\t\t\t\t\t\t</tr>\n\t\t\t\t\t\t\t\t\t\t<tr style=\"border-bottom:solid 1px #e5e5e5\"><td style=\"line-height:16px\" colspan=\"4\" height=\"16\">&nbsp;</td></tr>\n\t\t\t\t\t\t\t\t\t\t</tbody>\n\t\t\t\t\t\t\t\t\t\t</table>\n\t\t\t\t\t\t\t\t\t</td>\n\t\t\t\t\t\t\t\t</tr>\n\t\t\t\t\t\t\t\t\n\t\t\t\t\t\t\t\t\t\n\t\t\t\t\t\t\t\t\n\t\t\t\t\t\t</tbody>\n\t\t\t\t\t</table>\n\t\t\t\t\t\n                    <table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\">\n                        <tbody>\n\t\t\t\t\t\t\n\t\t\t\t\t\t\t\t<tr>\n\t\t\t\t\t\t\t\t\t\t<td style=\"padding:5px;\" width=\"100%\" align=\"left\">\n\t\t\t\t\t\t\t\t\t\t<span style=\"color:rgb(100,100,99)\" align=\"justify\"> Login-Id: nikhileshvyas@yahoo.com </span> \n\t\t\t\t\t\t\t\t\t\t</td>\n\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\n\t\t\t\t\t\t\t\t</tr>\n\t\t\t\t\t\t\t\t\n\t\t\t\t\t\t\t\t<tr>\n\t\t\t\t\t\t\t\t\t\t<td style=\"padding:5px;\" width=\"100%\" align=\"left\">\n\t\t\t\t\t\t\t\t\t\t\t<span style=\"color:rgb(100,100,99)\" align=\"justify\"> <p> Password: <b>\n\t\t\t\t\t\t\t\t\t\t\t<a href=\"http://123.63.2.150:8080/new_hm/hms/send_sms_for_verify_mobile?q=44/13913704761352733086\"> Click here </a> for one time verification of your mobile number and Login into HousingMatters for making life simpler for all your housing matters!</b></p>\n\t\t\t\t\t\t\t\t\t\t\t<p>Congratulations your registration request has been successfully approved  \n\t\t\t\t\t\t\t\t\t\t\t</p></span> \n\t\t\t\t\t\t\t\t\t\t</td>\n\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\n\t\t\t\t\t\t\t\t</tr>\n\t\t\t\t\t\t\t\t\n\t\t\t\t\t\t\t\t<tr>\n\t\t\t\t\t\t\t\t\t<td style=\"padding:5px;\" width=\"100%\" align=\"left\">\n\t\t\t\t\t\t\t\t\t\t\t<span style=\"color:rgb(100,100,99)\"> \n\t\t\t\t\t\t\t\t\t\t\t\tThank you.<br/>\n\t\t\t\t\t\t\t\t\t\t\t\tHousingMatters (Support Team)<br/>\n\t\t\t\t\t\t\t\t\t\t\t\twww.housingmatters.in\n\t\t\t\t\t\t\t\t\t\t\t</span>\n\t\t\t\t\t\t\t\t\t</td>\n\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\n\t\t\t\t\t\t\t\t</tr>\n\t\t\t\t\t\n\t\t\t\t\t</table>\n\t\t\t\t\t\n\t\t\t\t</td>\n\t\t\t</tr>\n\n        </tbody>\n</table>",
  "reply": "Support@housingmatters.in",
  "flag": NumberInt(1),
  "modified": ISODate("2016-03-17T09:08:16.0Z"),
  "created": ISODate("2016-03-17T09:08:16.0Z")
});
db.getCollection("email_requests").insert({
  "_id": ObjectId("56e91b185f66fb9c0f00005b"),
  "e_id": NumberInt(21),
  "to": "gopeshparihar7@gmail.com",
  "from": "Support@housingmatters.in",
  "from_name": "HousingMatters",
  "subject": "Welcome to Riddhi-Siddhi Apartment portal ",
  "message_web": "<table  align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\n          <tbody>\n\t\t\t<tr>\n                <td>\n                    <table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\">\n                        <tbody>\n\t\t\t\t\t\t\n\t\t\t\t\t\t\t\t<tr>\n\t\t\t\t\t\t\t\t\t<td colspan=\"2\">\n\t\t\t\t\t\t\t\t\t\t<table style=\"border-collapse:collapse\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\n\t\t\t\t\t\t\t\t\t\t<tbody>\n\t\t\t\t\t\t\t\t\t\t<tr><td style=\"line-height:16px\" colspan=\"4\" height=\"16\">&nbsp;</td></tr>\n\t\t\t\t\t\t\t\t\t\t<tr>\n\t\t\t\t\t\t\t\t\t\t<td style=\"height:32;line-height:0px\" align=\"left\" valign=\"middle\" width=\"32\"><a href=\"#150d7894359a47c6_\" style=\"color:#3b5998;text-decoration:none\"><img class=\"CToWUd\" src=\"http://123.63.2.150:8080/new_hm/as/hm/HM-LOGO-small.jpg\" style=\"border:0\" height=\"50\" width=\"50\"></a></td>\n\t\t\t\t\t\t\t\t\t\t<td style=\"display:block;width:15px\" width=\"15\">&nbsp;&nbsp;&nbsp;</td>\n\t\t\t\t\t\t\t\t\t\t<td width=\"100%\"><a href=\"#150d7894359a47c6_\" style=\"color:#3b5998;text-decoration:none;font-family:Helvetica Neue,Helvetica,Lucida Grande,tahoma,verdana,arial,sans-serif;font-size:19px;line-height:32px\"><span style=\"color:#00a0e3\">Housing</span><span style=\"color:#777776\">Matters</span></a></td>\n\t\t\t\t\t\t\t\t\t\t<td align=\"right\"><a href=\"https://www.facebook.com/HousingMatters.co.in\" target=\"_blank\"><img class=\"CToWUd\" src=\"http://123.63.2.150:8080/new_hm/as/hm/SMLogoFB.png\" style=\"max-height:30px;min-height:30px;width:30px;max-width:30px\" height=\"30px\" width=\"30px\"></a>\n\t\t\t\t\t\t\t\t\t\t\t\n\t\t\t\t\t\t\t\t\t\t</td>\n\t\t\t\t\t\t\t\t\t\t</tr>\n\t\t\t\t\t\t\t\t\t\t<tr style=\"border-bottom:solid 1px #e5e5e5\"><td style=\"line-height:16px\" colspan=\"4\" height=\"16\">&nbsp;</td></tr>\n\t\t\t\t\t\t\t\t\t\t</tbody>\n\t\t\t\t\t\t\t\t\t\t</table>\n\t\t\t\t\t\t\t\t\t</td>\n\t\t\t\t\t\t\t\t</tr>\n\t\t\t\t\t\t\t\t\n\t\t\t\t\t\t\t\t\t\n\t\t\t\t\t\t\t\t\n\t\t\t\t\t\t</tbody>\n\t\t\t\t\t</table>\n\t\t\t\t\t\n                    <table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\">\n                        <tbody>\n\t\t\t\t\t\t\n\t\t\t\t\t\t\t\t<tr>\n\t\t\t\t\t\t\t\t\t\t<td style=\"padding:5px;\" width=\"100%\" align=\"left\">\n\t\t\t\t\t\t\t\t\t\t<span style=\"color:rgb(100,100,99)\" align=\"justify\"> Dear Gopesh parihar, </span> \n\t\t\t\t\t\t\t\t\t\t</td>\n\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\n\t\t\t\t\t\t\t\t</tr>\n\t\t\t\t\t\t\t\t\n\t\t\t\t\t\t\t\t<tr>\n\t\t\t\t\t\t\t\t\t\t<td style=\"padding:5px;\" width=\"100%\" align=\"left\">\n\t\t\t\t\t\t\t\t\t\t 'We at Riddhi-Siddhi Apartment use HousingMatters - a dynamic web portal to interact with all owners/residents/staff for transparent & smart management of housing society affairs.\n\t\t\t\t\t\t\t\t\t\t\n\t\t\t\t\t\t\t\t\t\t\n\t\t\t\t\t\t\t\t\t\t\n\t\t\t\t\t\t\t\t\t\t\n\t\t\t\t\t\t\t\t\t\t</td>\n\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\n\t\t\t\t\t\t\t\t</tr>\n\t\t\t\t\t\t\t\t\n\t\t\t\t\t\t\t\t<tr>\n\t\t\t\t\t\t\t\t\t\t<td style=\"padding:5px;\" width=\"100%\" align=\"left\">\n\t\t\t\t\t\t\t\t\t\tAs you are an owner/resident/staff of Riddhi-Siddhi Apartment, we have added your email address in HousingMatters portal.\n\t\t\t\t\t\t\t\t\t\t</td>\n\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\n\t\t\t\t\t\t\t\t</tr>\n\t\t\t\t\t\t\t\t\n\t\t\t\t\t\t\t\t<tr>\n\t\t\t\t\t\t\t\t\t\t<td style=\"padding:5px;\" width=\"100%\" align=\"left\">\n\t\t\t\t\t\t\t\t\t\t\t\tHere are some of the important features related to our portal on HousingMatters:\n\t\t\t\t\t\t\t\t\t\t</td>\n\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\n\t\t\t\t\t\t\t\t</tr>\n\t\t\t\t\t\t\t\t\n\t\t\t\t\t\t\t\t<tr>\n\t\t\t\t\t\t\t\t\t\t<td style=\"padding:5px;\" width=\"100%\" align=\"left\">\n\t\t\t\t\t\t\t\t\t\t\t\tYou can log & track complaints, start new discussions, check your dues, post classifieds and many more in the portal.\n\t\t\t\t\t\t\t\t\t\t</td>\n\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\n\t\t\t\t\t\t\t\t</tr>\n\n\t\t\t\t\t\t\t\t\t<tr>\n\t\t\t\t\t\t\t\t\t<td style=\"padding:5px;\" width=\"100%\" align=\"left\">\n\t\t\t\t\t\t\t\t\tYou can receive important SMS & emails from your committee.\n\t\t\t\t\t\t\t\t\t</td>\n\n\t\t\t\t\t\t\t\t\t</tr>\n\t\t\t\t\t\t\t\t<tr>\n\t\t\t\t\t\t\t\t\t\t<td style=\"padding:5px;\" width=\"100%\" align=\"left\"><br/>\n\t\t\t\t\t\t\t\t\t\t\t<span  align=\"justify\"> <b>\n\t\t\t\t\t\t\t\t\t\t\t<a href=\"http://123.63.2.150:8080/new_hm/hms/set_new_password?q=64x213/12139332081183277859\"> Click here </a> for one time verification of your email and Login into HousingMatters for making life simpler for all your housing matters!</b>\n\t\t\t\t\t\t\t\t\t\t\t</span> \n\t\t\t\t\t\t\t\t\t\t</td>\n\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\n\t\t\t\t\t\t\t\t</tr>\n\t\t\t\t\t\t\t\t\n\t\t\t\t\t\t\t\t<tr>\n\t\t\t\t\t\t\t\t\t\t<td style=\"padding:5px;\" width=\"100%\" align=\"left\">\n\t\t\t\t\t\t\t\t\t\t<span align=\"justify\"> Pls add www.housingmatters.in in your favorite bookmarks for future use. </span> \n\t\t\t\t\t\t\t\t\t\t</td>\n\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\n\t\t\t\t\t\t\t\t</tr>\n\t\t\t\t\t\t\t\t\n\t\t\t\t\t\t\t\t<tr>\n\t\t\t\t\t\t\t\t\t<td style=\"padding:5px;\" width=\"100%\" align=\"left\">\n\t\t\t\t\t\t\t\t\t\t\t<span > \n\t\t\t\t\t\t\t\t\t\t\t\tRegards,<br/>\n\t\t\t\t\t\t\t\t\t\t\t\tAdministrator of Riddhi-Siddhi Apartment<br/>\n\t\t\t\t\t\t\t\t\t\t\t\twww.housingmatters.in\n\t\t\t\t\t\t\t\t\t\t\t</span>\n\t\t\t\t\t\t\t\t\t</td>\n\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\n\t\t\t\t\t\t\t\t</tr>\n\t\t\t\t\t\n\t\t\t\t\t</table>\n\t\t\t\t\t\n\t\t\t\t</td>\n\t\t\t</tr>\n\n        </tbody>\n</table>",
  "reply": "support@housingmatters.in",
  "flag": NumberInt(1),
  "modified": ISODate("2016-03-16T08:36:40.0Z"),
  "created": ISODate("2016-03-16T08:36:40.0Z")
});
db.getCollection("email_requests").insert({
  "_id": ObjectId("56e91b185f66fb9c0f00005c"),
  "e_id": NumberInt(22),
  "to": "joshirohit988@yahoo.com",
  "from": "Support@housingmatters.in",
  "from_name": "HousingMatters",
  "subject": "Welcome to Riddhi-Siddhi Apartment portal ",
  "message_web": "<table  align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\n          <tbody>\n\t\t\t<tr>\n                <td>\n                    <table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\">\n                        <tbody>\n\t\t\t\t\t\t\n\t\t\t\t\t\t\t\t<tr>\n\t\t\t\t\t\t\t\t\t<td colspan=\"2\">\n\t\t\t\t\t\t\t\t\t\t<table style=\"border-collapse:collapse\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\n\t\t\t\t\t\t\t\t\t\t<tbody>\n\t\t\t\t\t\t\t\t\t\t<tr><td style=\"line-height:16px\" colspan=\"4\" height=\"16\">&nbsp;</td></tr>\n\t\t\t\t\t\t\t\t\t\t<tr>\n\t\t\t\t\t\t\t\t\t\t<td style=\"height:32;line-height:0px\" align=\"left\" valign=\"middle\" width=\"32\"><a href=\"#150d7894359a47c6_\" style=\"color:#3b5998;text-decoration:none\"><img class=\"CToWUd\" src=\"http://123.63.2.150:8080/new_hm/as/hm/HM-LOGO-small.jpg\" style=\"border:0\" height=\"50\" width=\"50\"></a></td>\n\t\t\t\t\t\t\t\t\t\t<td style=\"display:block;width:15px\" width=\"15\">&nbsp;&nbsp;&nbsp;</td>\n\t\t\t\t\t\t\t\t\t\t<td width=\"100%\"><a href=\"#150d7894359a47c6_\" style=\"color:#3b5998;text-decoration:none;font-family:Helvetica Neue,Helvetica,Lucida Grande,tahoma,verdana,arial,sans-serif;font-size:19px;line-height:32px\"><span style=\"color:#00a0e3\">Housing</span><span style=\"color:#777776\">Matters</span></a></td>\n\t\t\t\t\t\t\t\t\t\t<td align=\"right\"><a href=\"https://www.facebook.com/HousingMatters.co.in\" target=\"_blank\"><img class=\"CToWUd\" src=\"http://123.63.2.150:8080/new_hm/as/hm/SMLogoFB.png\" style=\"max-height:30px;min-height:30px;width:30px;max-width:30px\" height=\"30px\" width=\"30px\"></a>\n\t\t\t\t\t\t\t\t\t\t\t\n\t\t\t\t\t\t\t\t\t\t</td>\n\t\t\t\t\t\t\t\t\t\t</tr>\n\t\t\t\t\t\t\t\t\t\t<tr style=\"border-bottom:solid 1px #e5e5e5\"><td style=\"line-height:16px\" colspan=\"4\" height=\"16\">&nbsp;</td></tr>\n\t\t\t\t\t\t\t\t\t\t</tbody>\n\t\t\t\t\t\t\t\t\t\t</table>\n\t\t\t\t\t\t\t\t\t</td>\n\t\t\t\t\t\t\t\t</tr>\n\t\t\t\t\t\t\t\t\n\t\t\t\t\t\t\t\t\t\n\t\t\t\t\t\t\t\t\n\t\t\t\t\t\t</tbody>\n\t\t\t\t\t</table>\n\t\t\t\t\t\n                    <table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\">\n                        <tbody>\n\t\t\t\t\t\t\n\t\t\t\t\t\t\t\t<tr>\n\t\t\t\t\t\t\t\t\t\t<td style=\"padding:5px;\" width=\"100%\" align=\"left\">\n\t\t\t\t\t\t\t\t\t\t<span style=\"color:rgb(100,100,99)\" align=\"justify\"> Dear Rohit Joshi, </span> \n\t\t\t\t\t\t\t\t\t\t</td>\n\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\n\t\t\t\t\t\t\t\t</tr>\n\t\t\t\t\t\t\t\t<tr>\n\t\t\t\t\t\t\t\t\t\t<td style=\"padding:5px;\" width=\"100%\" align=\"left\">\n\t\t\t\t\t\t\t\t\t\t<span style=\"color:rgb(100,100,99)\" align=\"justify\">As a family member, you have been added to Riddhi-Siddhi Apartment online portal by Syska plywood Pvt. Ltd. A-102 </span> \n\t\t\t\t\t\t\t\t\t\t</td>\n\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\n\t\t\t\t\t\t\t\t</tr>\n\t\t\t\t\t\t\t\t<tr>\n\t\t\t\t\t\t\t\t\t\t<td style=\"padding:5px;\" width=\"100%\" align=\"left\">\n\t\t\t\t\t\t\t\t\t\t We at Riddhi-Siddhi Apartment use HousingMatters - a dynamic web portal to interact with all owners/residents/staff for transparent & smart management of housing society affairs.\n\t\t\t\t\t\t\t\t\t\t\n\t\t\t\t\t\t\t\t\t\t\n\t\t\t\t\t\t\t\t\t\t</td>\n\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\n\t\t\t\t\t\t\t\t</tr>\n\t\t\t\t\t\t\t\t\n\t\t\t\t\t\t\t\t<tr>\n\t\t\t\t\t\t\t\t\t\t<td style=\"padding:5px;\" width=\"100%\" align=\"left\">\n\t\t\t\t\t\t\t\t\t\tAs you are an owner/resident/staff of Riddhi-Siddhi Apartment, we have added your email address in HousingMatters portal.\n\t\t\t\t\t\t\t\t\t\t</td>\n\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\n\t\t\t\t\t\t\t\t</tr>\n\t\t\t\t\t\t\t\t\n\t\t\t\t\t\t\t\t<tr>\n\t\t\t\t\t\t\t\t\t\t<td style=\"padding:5px;\" width=\"100%\" align=\"left\">\n\t\t\t\t\t\t\t\t\t\t\t\tHere are some of the important features related to our portal on HousingMatters:\n\t\t\t\t\t\t\t\t\t\t</td>\n\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\n\t\t\t\t\t\t\t\t</tr>\n\t\t\t\t\t\t\t\t\n\t\t\t\t\t\t\t\t<tr>\n\t\t\t\t\t\t\t\t\t\t<td style=\"padding:5px;\" width=\"100%\" align=\"left\">\n\t\t\t\t\t\t\t\t\t\t\t\tYou can log & track complaints, start new discussions, check your dues, post classifieds and many more in the portal.\n\t\t\t\t\t\t\t\t\t\t</td>\n\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\n\t\t\t\t\t\t\t\t</tr>\n\n\t\t\t\t\t\t\t\t\t<tr>\n\t\t\t\t\t\t\t\t\t<td style=\"padding:5px;\" width=\"100%\" align=\"left\">\n\t\t\t\t\t\t\t\t\tYou can receive important SMS & emails from your committee.\n\t\t\t\t\t\t\t\t\t</td>\n\n\t\t\t\t\t\t\t\t\t</tr>\n\t\t\t\t\t\t\t\t<tr>\n\t\t\t\t\t\t\t\t\t\t<td style=\"padding:5px;\" width=\"100%\" align=\"left\"><br/>\n\t\t\t\t\t\t\t\t\t\t\t<span  align=\"justify\"> <b>\n\t\t\t\t\t\t\t\t\t\t\t<a href=\"http://123.63.2.150:8080/new_hm/hms/set_new_password?q=64y2v2/11320802871183403527\"> Click here </a> for one time verification of your email and Login into HousingMatters for making life simpler for all your housing matters!</b>\n\t\t\t\t\t\t\t\t\t\t\t</span> \n\t\t\t\t\t\t\t\t\t\t</td>\n\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\n\t\t\t\t\t\t\t\t</tr>\n\t\t\t\t\t\t\t\t\n\t\t\t\t\t\t\t\t<tr>\n\t\t\t\t\t\t\t\t\t\t<td style=\"padding:5px;\" width=\"100%\" align=\"left\">\n\t\t\t\t\t\t\t\t\t\t<span align=\"justify\"> Pls add www.housingmatters.in in your favorite bookmarks for future use. </span> \n\t\t\t\t\t\t\t\t\t\t</td>\n\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\n\t\t\t\t\t\t\t\t</tr>\n\t\t\t\t\t\t\t\t\n\t\t\t\t\t\t\t\t<tr>\n\t\t\t\t\t\t\t\t\t<td style=\"padding:5px;\" width=\"100%\" align=\"left\">\n\t\t\t\t\t\t\t\t\t\t\t<span > \n\t\t\t\t\t\t\t\t\t\t\t\tRegards,<br/>\n\t\t\t\t\t\t\t\t\t\t\t\tAdministrator of Riddhi-Siddhi Apartment<br/>\n\t\t\t\t\t\t\t\t\t\t\t\twww.housingmatters.in\n\t\t\t\t\t\t\t\t\t\t\t</span>\n\t\t\t\t\t\t\t\t\t</td>\n\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\n\t\t\t\t\t\t\t\t</tr>\n\t\t\t\t\t\n\t\t\t\t\t</table>\n\t\t\t\t\t\n\t\t\t\t</td>\n\t\t\t</tr>\n\n        </tbody>\n</table>",
  "reply": "support@housingmatters.in",
  "flag": NumberInt(1),
  "modified": ISODate("2016-03-16T08:36:40.0Z"),
  "created": ISODate("2016-03-16T08:36:40.0Z")
});

/** fix_deposits records **/
db.getCollection("fix_deposits").insert({
  "_id": ObjectId("56ea47c25f66fb440c000000"),
  "account_reference": "dsgdsgds",
  "auto_inc": "YES",
  "bank_branch": "gdsgsdg",
  "bank_name": "dsfhshsd",
  "created": ISODate("2016-03-17T05:59:30.0Z"),
  "current_date": "2016-03-17",
  "file_name": "user_enrollment_file.csv",
  "interest_rate": "5",
  "matured_status": NumberInt(2),
  "maturity_date": NumberInt(1459362600),
  "modified": ISODate("2016-03-17T05:59:30.0Z"),
  "move_by": NumberInt(247),
  "move_on": "2016-03-17",
  "prepaired_by": NumberInt(247),
  "principal_amount": "10000",
  "purpose": "Reserve Fund",
  "receipt_id": NumberInt(1001),
  "society_id": NumberInt(5),
  "start_date": NumberInt(1456770600),
  "transaction_id": NumberInt(1)
});
db.getCollection("fix_deposits").insert({
  "_id": ObjectId("56ea70115f66fb1008000000"),
  "account_reference": "1111",
  "auto_inc": "YES",
  "bank_branch": "Hiran magri",
  "bank_name": "SBBJ Bank",
  "created": ISODate("2016-03-17T08:51:29.0Z"),
  "current_date": "2016-03-17",
  "file_name": "model7.jpg",
  "interest_rate": "2",
  "matured_status": NumberInt(2),
  "maturity_date": NumberInt(1458153000),
  "modified": ISODate("2016-03-17T08:51:29.0Z"),
  "prepaired_by": NumberInt(247),
  "principal_amount": "100",
  "purpose": "General Fund",
  "receipt_id": NumberInt(1002),
  "renewal": "y",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1458153000),
  "transaction_id": NumberInt(2)
});
db.getCollection("fix_deposits").insert({
  "_id": ObjectId("56ea706c5f66fbb41a000000"),
  "transaction_id": NumberInt(3),
  "receipt_id": "1002/1",
  "bank_name": "SBBJ Bank",
  "bank_branch": "Hiran magri",
  "account_reference": "1111",
  "principal_amount": "100",
  "start_date": NumberInt(1458153000),
  "maturity_date": NumberInt(1458153000),
  "interest_rate": "2",
  "purpose": "General Fund",
  "file_name": "",
  "society_id": NumberInt(5),
  "matured_status": NumberInt(1),
  "auto_inc": "NO",
  "renewal_id": NumberInt(1),
  "prepaired_by": NumberInt(247),
  "current_date": "2016-03-17",
  "modified": ISODate("2016-03-17T08:53:00.0Z"),
  "created": ISODate("2016-03-17T08:53:00.0Z")
});

/** hm_modules_assigns records **/
db.getCollection("hm_modules_assigns").insert({
  "_id": ObjectId("56ea74365f66fb380f000001"),
  "society_id": NumberInt(7),
  "module_id": NumberInt(1),
  "mt_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:09:10.0Z"),
  "created": ISODate("2016-03-17T09:09:10.0Z")
});
db.getCollection("hm_modules_assigns").insert({
  "_id": ObjectId("56ea74365f66fb380f000002"),
  "society_id": NumberInt(7),
  "module_id": NumberInt(2),
  "mt_id": NumberInt(1),
  "modified": ISODate("2016-03-17T09:09:10.0Z"),
  "created": ISODate("2016-03-17T09:09:10.0Z")
});
db.getCollection("hm_modules_assigns").insert({
  "_id": ObjectId("56ea74365f66fb380f000003"),
  "society_id": NumberInt(7),
  "module_id": NumberInt(3),
  "mt_id": NumberInt(1),
  "modified": ISODate("2016-03-17T09:09:10.0Z"),
  "created": ISODate("2016-03-17T09:09:10.0Z")
});
db.getCollection("hm_modules_assigns").insert({
  "_id": ObjectId("56ea74365f66fb380f000004"),
  "society_id": NumberInt(7),
  "module_id": NumberInt(4),
  "mt_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:09:10.0Z"),
  "created": ISODate("2016-03-17T09:09:10.0Z")
});
db.getCollection("hm_modules_assigns").insert({
  "_id": ObjectId("56ea74365f66fb380f000005"),
  "society_id": NumberInt(7),
  "module_id": NumberInt(5),
  "mt_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:09:10.0Z"),
  "created": ISODate("2016-03-17T09:09:10.0Z")
});
db.getCollection("hm_modules_assigns").insert({
  "_id": ObjectId("56ea74365f66fb380f000006"),
  "society_id": NumberInt(7),
  "module_id": NumberInt(6),
  "mt_id": NumberInt(1),
  "modified": ISODate("2016-03-17T09:09:10.0Z"),
  "created": ISODate("2016-03-17T09:09:10.0Z")
});
db.getCollection("hm_modules_assigns").insert({
  "_id": ObjectId("56ea74365f66fb380f000007"),
  "society_id": NumberInt(7),
  "module_id": NumberInt(7),
  "mt_id": NumberInt(1),
  "modified": ISODate("2016-03-17T09:09:10.0Z"),
  "created": ISODate("2016-03-17T09:09:10.0Z")
});
db.getCollection("hm_modules_assigns").insert({
  "_id": ObjectId("56ea74365f66fb380f000008"),
  "society_id": NumberInt(7),
  "module_id": NumberInt(9),
  "mt_id": NumberInt(3),
  "modified": ISODate("2016-03-17T09:09:10.0Z"),
  "created": ISODate("2016-03-17T09:09:10.0Z")
});
db.getCollection("hm_modules_assigns").insert({
  "_id": ObjectId("56ea74365f66fb380f000009"),
  "society_id": NumberInt(7),
  "module_id": NumberInt(10),
  "mt_id": NumberInt(3),
  "modified": ISODate("2016-03-17T09:09:10.0Z"),
  "created": ISODate("2016-03-17T09:09:10.0Z")
});
db.getCollection("hm_modules_assigns").insert({
  "_id": ObjectId("56ea74365f66fb380f00000a"),
  "society_id": NumberInt(7),
  "module_id": NumberInt(11),
  "mt_id": NumberInt(3),
  "modified": ISODate("2016-03-17T09:09:10.0Z"),
  "created": ISODate("2016-03-17T09:09:10.0Z")
});
db.getCollection("hm_modules_assigns").insert({
  "_id": ObjectId("56ea74365f66fb380f00000b"),
  "society_id": NumberInt(7),
  "module_id": NumberInt(12),
  "mt_id": NumberInt(3),
  "modified": ISODate("2016-03-17T09:09:10.0Z"),
  "created": ISODate("2016-03-17T09:09:10.0Z")
});
db.getCollection("hm_modules_assigns").insert({
  "_id": ObjectId("56ea74365f66fb380f00000c"),
  "society_id": NumberInt(7),
  "module_id": NumberInt(13),
  "mt_id": NumberInt(3),
  "modified": ISODate("2016-03-17T09:09:10.0Z"),
  "created": ISODate("2016-03-17T09:09:10.0Z")
});
db.getCollection("hm_modules_assigns").insert({
  "_id": ObjectId("56ea74365f66fb380f00000d"),
  "society_id": NumberInt(7),
  "module_id": NumberInt(14),
  "mt_id": NumberInt(3),
  "modified": ISODate("2016-03-17T09:09:10.0Z"),
  "created": ISODate("2016-03-17T09:09:10.0Z")
});
db.getCollection("hm_modules_assigns").insert({
  "_id": ObjectId("56ea74365f66fb380f00000e"),
  "society_id": NumberInt(7),
  "module_id": NumberInt(16),
  "mt_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:09:10.0Z"),
  "created": ISODate("2016-03-17T09:09:10.0Z")
});
db.getCollection("hm_modules_assigns").insert({
  "_id": ObjectId("56ea74365f66fb380f00000f"),
  "society_id": NumberInt(7),
  "module_id": NumberInt(17),
  "mt_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:09:10.0Z"),
  "created": ISODate("2016-03-17T09:09:10.0Z")
});
db.getCollection("hm_modules_assigns").insert({
  "_id": ObjectId("56ea74365f66fb380f000010"),
  "society_id": NumberInt(7),
  "module_id": NumberInt(18),
  "mt_id": NumberInt(6),
  "modified": ISODate("2016-03-17T09:09:10.0Z"),
  "created": ISODate("2016-03-17T09:09:10.0Z")
});
db.getCollection("hm_modules_assigns").insert({
  "_id": ObjectId("56ea74365f66fb380f000011"),
  "society_id": NumberInt(7),
  "module_id": NumberInt(19),
  "mt_id": NumberInt(6),
  "modified": ISODate("2016-03-17T09:09:10.0Z"),
  "created": ISODate("2016-03-17T09:09:10.0Z")
});
db.getCollection("hm_modules_assigns").insert({
  "_id": ObjectId("56ea74365f66fb380f000012"),
  "society_id": NumberInt(7),
  "module_id": NumberInt(20),
  "mt_id": NumberInt(6),
  "modified": ISODate("2016-03-17T09:09:10.0Z"),
  "created": ISODate("2016-03-17T09:09:10.0Z")
});
db.getCollection("hm_modules_assigns").insert({
  "_id": ObjectId("56ea74365f66fb380f000013"),
  "society_id": NumberInt(7),
  "module_id": NumberInt(21),
  "mt_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:09:10.0Z"),
  "created": ISODate("2016-03-17T09:09:10.0Z")
});
db.getCollection("hm_modules_assigns").insert({
  "_id": ObjectId("56ea74365f66fb380f000014"),
  "society_id": NumberInt(7),
  "module_id": NumberInt(35),
  "mt_id": NumberInt(6),
  "modified": ISODate("2016-03-17T09:09:10.0Z"),
  "created": ISODate("2016-03-17T09:09:10.0Z")
});
db.getCollection("hm_modules_assigns").insert({
  "_id": ObjectId("56ea74365f66fb380f000015"),
  "society_id": NumberInt(7),
  "module_id": NumberInt(36),
  "mt_id": NumberInt(6),
  "modified": ISODate("2016-03-17T09:09:10.0Z"),
  "created": ISODate("2016-03-17T09:09:10.0Z")
});
db.getCollection("hm_modules_assigns").insert({
  "_id": ObjectId("56ea74365f66fb380f000016"),
  "society_id": NumberInt(7),
  "module_id": NumberInt(28),
  "mt_id": NumberInt(3),
  "modified": ISODate("2016-03-17T09:09:10.0Z"),
  "created": ISODate("2016-03-17T09:09:10.0Z")
});
db.getCollection("hm_modules_assigns").insert({
  "_id": ObjectId("56ea74365f66fb380f000017"),
  "society_id": NumberInt(7),
  "module_id": NumberInt(37),
  "mt_id": NumberInt(6),
  "modified": ISODate("2016-03-17T09:09:10.0Z"),
  "created": ISODate("2016-03-17T09:09:10.0Z")
});
db.getCollection("hm_modules_assigns").insert({
  "_id": ObjectId("56ea74365f66fb380f000018"),
  "society_id": NumberInt(7),
  "module_id": NumberInt(38),
  "mt_id": NumberInt(6),
  "modified": ISODate("2016-03-17T09:09:10.0Z"),
  "created": ISODate("2016-03-17T09:09:10.0Z")
});
db.getCollection("hm_modules_assigns").insert({
  "_id": ObjectId("56ea74365f66fb380f000019"),
  "society_id": NumberInt(7),
  "module_id": NumberInt(39),
  "mt_id": NumberInt(6),
  "modified": ISODate("2016-03-17T09:09:10.0Z"),
  "created": ISODate("2016-03-17T09:09:10.0Z")
});
db.getCollection("hm_modules_assigns").insert({
  "_id": ObjectId("56ea74365f66fb380f00001a"),
  "society_id": NumberInt(7),
  "module_id": NumberInt(15),
  "mt_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:09:10.0Z"),
  "created": ISODate("2016-03-17T09:09:10.0Z")
});
db.getCollection("hm_modules_assigns").insert({
  "_id": ObjectId("56ea74365f66fb380f00001b"),
  "society_id": NumberInt(7),
  "module_id": NumberInt(34),
  "mt_id": NumberInt(3),
  "modified": ISODate("2016-03-17T09:09:10.0Z"),
  "created": ISODate("2016-03-17T09:09:10.0Z")
});
db.getCollection("hm_modules_assigns").insert({
  "_id": ObjectId("56ea74365f66fb380f00001c"),
  "society_id": NumberInt(7),
  "module_id": NumberInt(40),
  "mt_id": NumberInt(5),
  "modified": ISODate("2016-03-17T09:09:10.0Z"),
  "created": ISODate("2016-03-17T09:09:10.0Z")
});
db.getCollection("hm_modules_assigns").insert({
  "_id": ObjectId("56ea74365f66fb380f00001d"),
  "society_id": NumberInt(7),
  "module_id": NumberInt(41),
  "mt_id": NumberInt(5),
  "modified": ISODate("2016-03-17T09:09:10.0Z"),
  "created": ISODate("2016-03-17T09:09:10.0Z")
});

/** import_user_enrollment_records records **/

/** module_types records **/
db.getCollection("module_types").insert({
  "_id": ObjectId("54439cbdf8bf0eb00b000000"),
  "icon": "icon-external-link",
  "module_type_id": NumberInt(2),
  "module_type_name": "Resources",
  "order": NumberInt(2)
});
db.getCollection("module_types").insert({
  "_id": ObjectId("54439ce2f8bf0ec40b000000"),
  "icon": "icon-comment",
  "module_type_id": NumberInt(1),
  "module_type_name": "Forums",
  "order": NumberInt(1)
});
db.getCollection("module_types").insert({
  "_id": ObjectId("5443a072f8bf0ec00b000000"),
  "icon": "icon-th-large",
  "module_type_id": NumberInt(3),
  "module_type_name": "Accounting",
  "order": NumberInt(4)
});
db.getCollection("module_types").insert({
  "_id": ObjectId("5444a5185f66fb480800001d"),
  "icon": "icon-user-md",
  "module_type_id": NumberInt(6),
  "module_type_name": "Administration",
  "order": NumberInt(3)
});
db.getCollection("module_types").insert({
  "_id": ObjectId("5443a097f8bf0ec00b000002"),
  "icon": "icon-user-md",
  "module_type_id": NumberInt(5),
  "module_type_name": "Governance",
  "order": NumberInt(5)
});

/** opening_balance_csv_converteds records **/
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8dfe5f66fbf410000381"),
  "auto_id": NumberInt(1),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(442),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(1),
  "flat_id": NumberInt(193),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:10.0Z"),
  "created": ISODate("2016-03-17T10:59:10.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8dfe5f66fbf410000382"),
  "auto_id": NumberInt(2),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(443),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(1),
  "flat_id": NumberInt(194),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:10.0Z"),
  "created": ISODate("2016-03-17T10:59:10.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8dfe5f66fbf410000383"),
  "auto_id": NumberInt(3),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(444),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(1),
  "flat_id": NumberInt(195),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:10.0Z"),
  "created": ISODate("2016-03-17T10:59:10.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8dfe5f66fbf410000384"),
  "auto_id": NumberInt(4),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(445),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(1),
  "flat_id": NumberInt(196),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:10.0Z"),
  "created": ISODate("2016-03-17T10:59:10.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8dfe5f66fbf410000385"),
  "auto_id": NumberInt(5),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(446),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(1),
  "flat_id": NumberInt(1),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:10.0Z"),
  "created": ISODate("2016-03-17T10:59:10.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8dfe5f66fbf410000386"),
  "auto_id": NumberInt(6),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(447),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(1),
  "flat_id": NumberInt(2),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:10.0Z"),
  "created": ISODate("2016-03-17T10:59:10.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8dfe5f66fbf410000387"),
  "auto_id": NumberInt(7),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(448),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(1),
  "flat_id": NumberInt(3),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:10.0Z"),
  "created": ISODate("2016-03-17T10:59:10.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8dfe5f66fbf410000388"),
  "auto_id": NumberInt(8),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(449),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(1),
  "flat_id": NumberInt(4),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:10.0Z"),
  "created": ISODate("2016-03-17T10:59:10.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8dfe5f66fbf410000389"),
  "auto_id": NumberInt(9),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(450),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(1),
  "flat_id": NumberInt(5),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:10.0Z"),
  "created": ISODate("2016-03-17T10:59:10.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8dfe5f66fbf41000038a"),
  "auto_id": NumberInt(10),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(451),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(1),
  "flat_id": NumberInt(6),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:10.0Z"),
  "created": ISODate("2016-03-17T10:59:10.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8dfe5f66fbf41000038b"),
  "auto_id": NumberInt(11),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(452),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(1),
  "flat_id": NumberInt(7),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:10.0Z"),
  "created": ISODate("2016-03-17T10:59:10.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8dfe5f66fbf41000038c"),
  "auto_id": NumberInt(12),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(453),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(1),
  "flat_id": NumberInt(8),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:10.0Z"),
  "created": ISODate("2016-03-17T10:59:10.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8dfe5f66fbf41000038d"),
  "auto_id": NumberInt(13),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(454),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(1),
  "flat_id": NumberInt(9),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:10.0Z"),
  "created": ISODate("2016-03-17T10:59:10.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8dfe5f66fbf41000038e"),
  "auto_id": NumberInt(14),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(455),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(1),
  "flat_id": NumberInt(10),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:10.0Z"),
  "created": ISODate("2016-03-17T10:59:10.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8dfe5f66fbf41000038f"),
  "auto_id": NumberInt(15),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(456),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(1),
  "flat_id": NumberInt(11),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:10.0Z"),
  "created": ISODate("2016-03-17T10:59:10.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8dfe5f66fbf410000390"),
  "auto_id": NumberInt(16),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(457),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(1),
  "flat_id": NumberInt(12),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:10.0Z"),
  "created": ISODate("2016-03-17T10:59:10.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8dfe5f66fbf410000391"),
  "auto_id": NumberInt(17),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(458),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(1),
  "flat_id": NumberInt(13),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:10.0Z"),
  "created": ISODate("2016-03-17T10:59:10.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8dfe5f66fbf410000392"),
  "auto_id": NumberInt(18),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(459),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(1),
  "flat_id": NumberInt(14),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:10.0Z"),
  "created": ISODate("2016-03-17T10:59:10.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8dfe5f66fbf410000393"),
  "auto_id": NumberInt(19),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(460),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(1),
  "flat_id": NumberInt(15),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:10.0Z"),
  "created": ISODate("2016-03-17T10:59:10.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8dfe5f66fbf410000394"),
  "auto_id": NumberInt(20),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(461),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(1),
  "flat_id": NumberInt(16),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:10.0Z"),
  "created": ISODate("2016-03-17T10:59:10.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8dff5f66fbf410000395"),
  "auto_id": NumberInt(21),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(462),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(1),
  "flat_id": NumberInt(17),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:11.0Z"),
  "created": ISODate("2016-03-17T10:59:11.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8dff5f66fbf410000396"),
  "auto_id": NumberInt(22),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(463),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(1),
  "flat_id": NumberInt(18),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:11.0Z"),
  "created": ISODate("2016-03-17T10:59:11.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8dff5f66fbf410000397"),
  "auto_id": NumberInt(23),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(464),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(1),
  "flat_id": NumberInt(19),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:11.0Z"),
  "created": ISODate("2016-03-17T10:59:11.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8dff5f66fbf410000398"),
  "auto_id": NumberInt(24),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(465),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(1),
  "flat_id": NumberInt(20),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:11.0Z"),
  "created": ISODate("2016-03-17T10:59:11.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8dff5f66fbf410000399"),
  "auto_id": NumberInt(25),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(466),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(1),
  "flat_id": NumberInt(21),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:11.0Z"),
  "created": ISODate("2016-03-17T10:59:11.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8dff5f66fbf41000039a"),
  "auto_id": NumberInt(26),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(467),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(1),
  "flat_id": NumberInt(22),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:11.0Z"),
  "created": ISODate("2016-03-17T10:59:11.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8dff5f66fbf41000039b"),
  "auto_id": NumberInt(27),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(468),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(1),
  "flat_id": NumberInt(23),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:11.0Z"),
  "created": ISODate("2016-03-17T10:59:11.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8dff5f66fbf41000039c"),
  "auto_id": NumberInt(28),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(469),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(1),
  "flat_id": NumberInt(24),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:11.0Z"),
  "created": ISODate("2016-03-17T10:59:11.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8dff5f66fbf41000039d"),
  "auto_id": NumberInt(29),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(470),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(1),
  "flat_id": NumberInt(25),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:11.0Z"),
  "created": ISODate("2016-03-17T10:59:11.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8dff5f66fbf41000039e"),
  "auto_id": NumberInt(30),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(471),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(1),
  "flat_id": NumberInt(26),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:11.0Z"),
  "created": ISODate("2016-03-17T10:59:11.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8dff5f66fbf41000039f"),
  "auto_id": NumberInt(31),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(472),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(1),
  "flat_id": NumberInt(27),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:11.0Z"),
  "created": ISODate("2016-03-17T10:59:11.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8dff5f66fbf4100003a0"),
  "auto_id": NumberInt(32),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(473),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(1),
  "flat_id": NumberInt(28),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:11.0Z"),
  "created": ISODate("2016-03-17T10:59:11.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8dff5f66fbf4100003a1"),
  "auto_id": NumberInt(33),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(474),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(1),
  "flat_id": NumberInt(29),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:11.0Z"),
  "created": ISODate("2016-03-17T10:59:11.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8dff5f66fbf4100003a2"),
  "auto_id": NumberInt(34),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(475),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(1),
  "flat_id": NumberInt(30),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:11.0Z"),
  "created": ISODate("2016-03-17T10:59:11.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8dff5f66fbf4100003a3"),
  "auto_id": NumberInt(35),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(476),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(1),
  "flat_id": NumberInt(31),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:11.0Z"),
  "created": ISODate("2016-03-17T10:59:11.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8dff5f66fbf4100003a4"),
  "auto_id": NumberInt(36),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(477),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(1),
  "flat_id": NumberInt(32),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:11.0Z"),
  "created": ISODate("2016-03-17T10:59:11.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8dff5f66fbf4100003a5"),
  "auto_id": NumberInt(37),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(478),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(1),
  "flat_id": NumberInt(33),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:11.0Z"),
  "created": ISODate("2016-03-17T10:59:11.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8dff5f66fbf4100003a6"),
  "auto_id": NumberInt(38),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(479),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(1),
  "flat_id": NumberInt(34),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:11.0Z"),
  "created": ISODate("2016-03-17T10:59:11.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8dff5f66fbf4100003a7"),
  "auto_id": NumberInt(39),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(480),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(1),
  "flat_id": NumberInt(35),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:11.0Z"),
  "created": ISODate("2016-03-17T10:59:11.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8dff5f66fbf4100003a8"),
  "auto_id": NumberInt(40),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(481),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(1),
  "flat_id": NumberInt(36),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:11.0Z"),
  "created": ISODate("2016-03-17T10:59:11.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8dff5f66fbf4100003a9"),
  "auto_id": NumberInt(41),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(482),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(1),
  "flat_id": NumberInt(37),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:11.0Z"),
  "created": ISODate("2016-03-17T10:59:11.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e005f66fbf4100003aa"),
  "auto_id": NumberInt(42),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(483),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(1),
  "flat_id": NumberInt(38),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:12.0Z"),
  "created": ISODate("2016-03-17T10:59:12.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e005f66fbf4100003ab"),
  "auto_id": NumberInt(43),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(484),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(1),
  "flat_id": NumberInt(39),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:12.0Z"),
  "created": ISODate("2016-03-17T10:59:12.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e005f66fbf4100003ac"),
  "auto_id": NumberInt(44),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(485),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(1),
  "flat_id": NumberInt(40),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:12.0Z"),
  "created": ISODate("2016-03-17T10:59:12.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e005f66fbf4100003ad"),
  "auto_id": NumberInt(45),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(486),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(1),
  "flat_id": NumberInt(41),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:12.0Z"),
  "created": ISODate("2016-03-17T10:59:12.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e005f66fbf4100003ae"),
  "auto_id": NumberInt(46),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(487),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(1),
  "flat_id": NumberInt(42),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:12.0Z"),
  "created": ISODate("2016-03-17T10:59:12.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e005f66fbf4100003af"),
  "auto_id": NumberInt(47),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(488),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(1),
  "flat_id": NumberInt(43),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:12.0Z"),
  "created": ISODate("2016-03-17T10:59:12.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e005f66fbf4100003b0"),
  "auto_id": NumberInt(48),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(489),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(1),
  "flat_id": NumberInt(44),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:12.0Z"),
  "created": ISODate("2016-03-17T10:59:12.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e005f66fbf4100003b1"),
  "auto_id": NumberInt(49),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(490),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(1),
  "flat_id": NumberInt(45),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:12.0Z"),
  "created": ISODate("2016-03-17T10:59:12.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e005f66fbf4100003b2"),
  "auto_id": NumberInt(50),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(491),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(1),
  "flat_id": NumberInt(46),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:12.0Z"),
  "created": ISODate("2016-03-17T10:59:12.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e005f66fbf4100003b3"),
  "auto_id": NumberInt(51),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(492),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(1),
  "flat_id": NumberInt(47),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:12.0Z"),
  "created": ISODate("2016-03-17T10:59:12.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e005f66fbf4100003b4"),
  "auto_id": NumberInt(52),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(493),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(1),
  "flat_id": NumberInt(48),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:12.0Z"),
  "created": ISODate("2016-03-17T10:59:12.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e005f66fbf4100003b5"),
  "auto_id": NumberInt(53),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(494),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(1),
  "flat_id": NumberInt(49),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:12.0Z"),
  "created": ISODate("2016-03-17T10:59:12.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e005f66fbf4100003b6"),
  "auto_id": NumberInt(54),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(495),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(1),
  "flat_id": NumberInt(50),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:12.0Z"),
  "created": ISODate("2016-03-17T10:59:12.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e005f66fbf4100003b7"),
  "auto_id": NumberInt(55),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(496),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(1),
  "flat_id": NumberInt(51),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:12.0Z"),
  "created": ISODate("2016-03-17T10:59:12.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e005f66fbf4100003b8"),
  "auto_id": NumberInt(56),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(497),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(1),
  "flat_id": NumberInt(52),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:12.0Z"),
  "created": ISODate("2016-03-17T10:59:12.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e005f66fbf4100003b9"),
  "auto_id": NumberInt(57),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(498),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(1),
  "flat_id": NumberInt(53),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:12.0Z"),
  "created": ISODate("2016-03-17T10:59:12.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e005f66fbf4100003ba"),
  "auto_id": NumberInt(58),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(499),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(1),
  "flat_id": NumberInt(54),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:12.0Z"),
  "created": ISODate("2016-03-17T10:59:12.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e005f66fbf4100003bb"),
  "auto_id": NumberInt(59),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(500),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(1),
  "flat_id": NumberInt(55),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:12.0Z"),
  "created": ISODate("2016-03-17T10:59:12.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e005f66fbf4100003bc"),
  "auto_id": NumberInt(60),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(501),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(1),
  "flat_id": NumberInt(56),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:12.0Z"),
  "created": ISODate("2016-03-17T10:59:12.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e005f66fbf4100003bd"),
  "auto_id": NumberInt(61),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(502),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(1),
  "flat_id": NumberInt(57),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:12.0Z"),
  "created": ISODate("2016-03-17T10:59:12.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e005f66fbf4100003be"),
  "auto_id": NumberInt(62),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(503),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(1),
  "flat_id": NumberInt(58),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:12.0Z"),
  "created": ISODate("2016-03-17T10:59:12.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e005f66fbf4100003bf"),
  "auto_id": NumberInt(63),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(504),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(1),
  "flat_id": NumberInt(59),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:12.0Z"),
  "created": ISODate("2016-03-17T10:59:12.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e005f66fbf4100003c0"),
  "auto_id": NumberInt(64),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(505),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(1),
  "flat_id": NumberInt(60),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:12.0Z"),
  "created": ISODate("2016-03-17T10:59:12.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e005f66fbf4100003c1"),
  "auto_id": NumberInt(65),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(506),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(1),
  "flat_id": NumberInt(61),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:12.0Z"),
  "created": ISODate("2016-03-17T10:59:12.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e015f66fbf4100003c2"),
  "auto_id": NumberInt(66),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(507),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(1),
  "flat_id": NumberInt(62),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:13.0Z"),
  "created": ISODate("2016-03-17T10:59:13.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e015f66fbf4100003c3"),
  "auto_id": NumberInt(67),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(508),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(1),
  "flat_id": NumberInt(63),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:13.0Z"),
  "created": ISODate("2016-03-17T10:59:13.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e015f66fbf4100003c4"),
  "auto_id": NumberInt(68),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(509),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(1),
  "flat_id": NumberInt(64),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:13.0Z"),
  "created": ISODate("2016-03-17T10:59:13.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e015f66fbf4100003c5"),
  "auto_id": NumberInt(69),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(510),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(1),
  "flat_id": NumberInt(65),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:13.0Z"),
  "created": ISODate("2016-03-17T10:59:13.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e015f66fbf4100003c6"),
  "auto_id": NumberInt(70),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(511),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(1),
  "flat_id": NumberInt(66),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:13.0Z"),
  "created": ISODate("2016-03-17T10:59:13.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e015f66fbf4100003c7"),
  "auto_id": NumberInt(71),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(512),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(1),
  "flat_id": NumberInt(67),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:13.0Z"),
  "created": ISODate("2016-03-17T10:59:13.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e015f66fbf4100003c8"),
  "auto_id": NumberInt(72),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(513),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(1),
  "flat_id": NumberInt(68),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:13.0Z"),
  "created": ISODate("2016-03-17T10:59:13.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e015f66fbf4100003c9"),
  "auto_id": NumberInt(73),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(514),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(1),
  "flat_id": NumberInt(69),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:13.0Z"),
  "created": ISODate("2016-03-17T10:59:13.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e015f66fbf4100003ca"),
  "auto_id": NumberInt(74),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(515),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(1),
  "flat_id": NumberInt(70),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:13.0Z"),
  "created": ISODate("2016-03-17T10:59:13.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e015f66fbf4100003cb"),
  "auto_id": NumberInt(75),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(516),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(1),
  "flat_id": NumberInt(71),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:13.0Z"),
  "created": ISODate("2016-03-17T10:59:13.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e015f66fbf4100003cc"),
  "auto_id": NumberInt(76),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(517),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(1),
  "flat_id": NumberInt(72),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:13.0Z"),
  "created": ISODate("2016-03-17T10:59:13.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e015f66fbf4100003cd"),
  "auto_id": NumberInt(77),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(518),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(1),
  "flat_id": NumberInt(73),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:13.0Z"),
  "created": ISODate("2016-03-17T10:59:13.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e015f66fbf4100003ce"),
  "auto_id": NumberInt(78),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(519),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(1),
  "flat_id": NumberInt(74),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:13.0Z"),
  "created": ISODate("2016-03-17T10:59:13.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e015f66fbf4100003cf"),
  "auto_id": NumberInt(79),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(520),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(1),
  "flat_id": NumberInt(75),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:13.0Z"),
  "created": ISODate("2016-03-17T10:59:13.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e015f66fbf4100003d0"),
  "auto_id": NumberInt(80),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(521),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(1),
  "flat_id": NumberInt(76),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:13.0Z"),
  "created": ISODate("2016-03-17T10:59:13.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e015f66fbf4100003d1"),
  "auto_id": NumberInt(81),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(522),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(1),
  "flat_id": NumberInt(77),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:13.0Z"),
  "created": ISODate("2016-03-17T10:59:13.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e015f66fbf4100003d2"),
  "auto_id": NumberInt(82),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(523),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(1),
  "flat_id": NumberInt(78),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:13.0Z"),
  "created": ISODate("2016-03-17T10:59:13.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e015f66fbf4100003d3"),
  "auto_id": NumberInt(83),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(524),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(1),
  "flat_id": NumberInt(79),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:13.0Z"),
  "created": ISODate("2016-03-17T10:59:13.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e015f66fbf4100003d4"),
  "auto_id": NumberInt(84),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(525),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(1),
  "flat_id": NumberInt(80),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:13.0Z"),
  "created": ISODate("2016-03-17T10:59:13.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e015f66fbf4100003d5"),
  "auto_id": NumberInt(85),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(526),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(1),
  "flat_id": NumberInt(81),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:13.0Z"),
  "created": ISODate("2016-03-17T10:59:13.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e015f66fbf4100003d6"),
  "auto_id": NumberInt(86),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(527),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(1),
  "flat_id": NumberInt(82),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:13.0Z"),
  "created": ISODate("2016-03-17T10:59:13.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e015f66fbf4100003d7"),
  "auto_id": NumberInt(87),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(528),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(1),
  "flat_id": NumberInt(83),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:13.0Z"),
  "created": ISODate("2016-03-17T10:59:13.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e025f66fbf4100003d8"),
  "auto_id": NumberInt(88),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(529),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(1),
  "flat_id": NumberInt(84),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:14.0Z"),
  "created": ISODate("2016-03-17T10:59:14.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e025f66fbf4100003d9"),
  "auto_id": NumberInt(89),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(530),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(1),
  "flat_id": NumberInt(85),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:14.0Z"),
  "created": ISODate("2016-03-17T10:59:14.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e025f66fbf4100003da"),
  "auto_id": NumberInt(90),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(403),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(1),
  "flat_id": NumberInt(86),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:14.0Z"),
  "created": ISODate("2016-03-17T10:59:14.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e025f66fbf4100003db"),
  "auto_id": NumberInt(91),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(404),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(1),
  "flat_id": NumberInt(87),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:14.0Z"),
  "created": ISODate("2016-03-17T10:59:14.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e025f66fbf4100003dc"),
  "auto_id": NumberInt(92),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(405),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(1),
  "flat_id": NumberInt(88),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:14.0Z"),
  "created": ISODate("2016-03-17T10:59:14.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e025f66fbf4100003dd"),
  "auto_id": NumberInt(93),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(406),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(1),
  "flat_id": NumberInt(89),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:14.0Z"),
  "created": ISODate("2016-03-17T10:59:14.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e025f66fbf4100003de"),
  "auto_id": NumberInt(94),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(531),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(1),
  "flat_id": NumberInt(90),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:14.0Z"),
  "created": ISODate("2016-03-17T10:59:14.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e025f66fbf4100003df"),
  "auto_id": NumberInt(95),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(407),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(1),
  "flat_id": NumberInt(91),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:14.0Z"),
  "created": ISODate("2016-03-17T10:59:14.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e025f66fbf4100003e0"),
  "auto_id": NumberInt(96),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(408),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(1),
  "flat_id": NumberInt(92),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:14.0Z"),
  "created": ISODate("2016-03-17T10:59:14.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e025f66fbf4100003e1"),
  "auto_id": NumberInt(97),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(532),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(1),
  "flat_id": NumberInt(93),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:14.0Z"),
  "created": ISODate("2016-03-17T10:59:14.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e025f66fbf4100003e2"),
  "auto_id": NumberInt(98),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(409),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(1),
  "flat_id": NumberInt(94),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:14.0Z"),
  "created": ISODate("2016-03-17T10:59:14.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e025f66fbf4100003e3"),
  "auto_id": NumberInt(99),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(533),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(1),
  "flat_id": NumberInt(95),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:14.0Z"),
  "created": ISODate("2016-03-17T10:59:14.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e025f66fbf4100003e4"),
  "auto_id": NumberInt(100),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(534),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(2),
  "flat_id": NumberInt(197),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:14.0Z"),
  "created": ISODate("2016-03-17T10:59:14.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e025f66fbf4100003e5"),
  "auto_id": NumberInt(101),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(535),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(2),
  "flat_id": NumberInt(198),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:14.0Z"),
  "created": ISODate("2016-03-17T10:59:14.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e025f66fbf4100003e6"),
  "auto_id": NumberInt(102),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(411),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(2),
  "flat_id": NumberInt(199),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:14.0Z"),
  "created": ISODate("2016-03-17T10:59:14.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e025f66fbf4100003e7"),
  "auto_id": NumberInt(103),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(536),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(2),
  "flat_id": NumberInt(200),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:14.0Z"),
  "created": ISODate("2016-03-17T10:59:14.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e025f66fbf4100003e8"),
  "auto_id": NumberInt(104),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(412),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(2),
  "flat_id": NumberInt(97),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:14.0Z"),
  "created": ISODate("2016-03-17T10:59:14.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e025f66fbf4100003e9"),
  "auto_id": NumberInt(105),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(413),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(2),
  "flat_id": NumberInt(98),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:14.0Z"),
  "created": ISODate("2016-03-17T10:59:14.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e025f66fbf4100003ea"),
  "auto_id": NumberInt(106),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(537),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(2),
  "flat_id": NumberInt(99),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:14.0Z"),
  "created": ISODate("2016-03-17T10:59:14.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e025f66fbf4100003eb"),
  "auto_id": NumberInt(107),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(538),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(2),
  "flat_id": NumberInt(100),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:14.0Z"),
  "created": ISODate("2016-03-17T10:59:14.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e025f66fbf4100003ec"),
  "auto_id": NumberInt(108),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(414),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(2),
  "flat_id": NumberInt(101),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:14.0Z"),
  "created": ISODate("2016-03-17T10:59:14.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e025f66fbf4100003ed"),
  "auto_id": NumberInt(109),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(415),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(2),
  "flat_id": NumberInt(102),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:14.0Z"),
  "created": ISODate("2016-03-17T10:59:14.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e025f66fbf4100003ee"),
  "auto_id": NumberInt(110),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(416),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(2),
  "flat_id": NumberInt(103),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:14.0Z"),
  "created": ISODate("2016-03-17T10:59:14.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e035f66fbf4100003ef"),
  "auto_id": NumberInt(111),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(417),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(2),
  "flat_id": NumberInt(104),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:15.0Z"),
  "created": ISODate("2016-03-17T10:59:15.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e035f66fbf4100003f0"),
  "auto_id": NumberInt(112),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(418),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(2),
  "flat_id": NumberInt(105),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:15.0Z"),
  "created": ISODate("2016-03-17T10:59:15.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e035f66fbf4100003f1"),
  "auto_id": NumberInt(113),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(419),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(2),
  "flat_id": NumberInt(106),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:15.0Z"),
  "created": ISODate("2016-03-17T10:59:15.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e035f66fbf4100003f2"),
  "auto_id": NumberInt(114),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(420),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(2),
  "flat_id": NumberInt(107),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:15.0Z"),
  "created": ISODate("2016-03-17T10:59:15.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e035f66fbf4100003f3"),
  "auto_id": NumberInt(115),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(421),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(2),
  "flat_id": NumberInt(108),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:15.0Z"),
  "created": ISODate("2016-03-17T10:59:15.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e035f66fbf4100003f4"),
  "auto_id": NumberInt(116),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(422),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(2),
  "flat_id": NumberInt(109),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:15.0Z"),
  "created": ISODate("2016-03-17T10:59:15.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e035f66fbf4100003f5"),
  "auto_id": NumberInt(117),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(539),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(2),
  "flat_id": NumberInt(110),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:15.0Z"),
  "created": ISODate("2016-03-17T10:59:15.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e035f66fbf4100003f6"),
  "auto_id": NumberInt(118),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(423),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(2),
  "flat_id": NumberInt(111),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:15.0Z"),
  "created": ISODate("2016-03-17T10:59:15.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e035f66fbf4100003f7"),
  "auto_id": NumberInt(119),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(424),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(2),
  "flat_id": NumberInt(112),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:15.0Z"),
  "created": ISODate("2016-03-17T10:59:15.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e035f66fbf4100003f8"),
  "auto_id": NumberInt(120),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(425),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(2),
  "flat_id": NumberInt(113),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:15.0Z"),
  "created": ISODate("2016-03-17T10:59:15.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e035f66fbf4100003f9"),
  "auto_id": NumberInt(121),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(426),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(2),
  "flat_id": NumberInt(114),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:15.0Z"),
  "created": ISODate("2016-03-17T10:59:15.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e035f66fbf4100003fa"),
  "auto_id": NumberInt(122),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(427),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(2),
  "flat_id": NumberInt(115),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:15.0Z"),
  "created": ISODate("2016-03-17T10:59:15.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e035f66fbf4100003fb"),
  "auto_id": NumberInt(123),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(428),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(2),
  "flat_id": NumberInt(116),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:15.0Z"),
  "created": ISODate("2016-03-17T10:59:15.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e035f66fbf4100003fc"),
  "auto_id": NumberInt(124),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(540),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(2),
  "flat_id": NumberInt(117),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:15.0Z"),
  "created": ISODate("2016-03-17T10:59:15.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e035f66fbf4100003fd"),
  "auto_id": NumberInt(125),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(429),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(2),
  "flat_id": NumberInt(118),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:15.0Z"),
  "created": ISODate("2016-03-17T10:59:15.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e035f66fbf4100003fe"),
  "auto_id": NumberInt(126),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(541),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(2),
  "flat_id": NumberInt(119),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:15.0Z"),
  "created": ISODate("2016-03-17T10:59:15.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e035f66fbf4100003ff"),
  "auto_id": NumberInt(127),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(430),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(2),
  "flat_id": NumberInt(120),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:15.0Z"),
  "created": ISODate("2016-03-17T10:59:15.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e035f66fbf410000400"),
  "auto_id": NumberInt(128),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(542),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(2),
  "flat_id": NumberInt(121),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:15.0Z"),
  "created": ISODate("2016-03-17T10:59:15.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e035f66fbf410000401"),
  "auto_id": NumberInt(129),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(431),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(2),
  "flat_id": NumberInt(122),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:15.0Z"),
  "created": ISODate("2016-03-17T10:59:15.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e035f66fbf410000402"),
  "auto_id": NumberInt(130),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(432),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(2),
  "flat_id": NumberInt(123),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:15.0Z"),
  "created": ISODate("2016-03-17T10:59:15.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e035f66fbf410000403"),
  "auto_id": NumberInt(131),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(433),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(2),
  "flat_id": NumberInt(124),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:15.0Z"),
  "created": ISODate("2016-03-17T10:59:15.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e035f66fbf410000404"),
  "auto_id": NumberInt(132),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(434),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(2),
  "flat_id": NumberInt(125),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:15.0Z"),
  "created": ISODate("2016-03-17T10:59:15.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e045f66fbf410000405"),
  "auto_id": NumberInt(133),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(543),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(2),
  "flat_id": NumberInt(126),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:16.0Z"),
  "created": ISODate("2016-03-17T10:59:16.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e045f66fbf410000406"),
  "auto_id": NumberInt(134),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(435),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(2),
  "flat_id": NumberInt(127),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:16.0Z"),
  "created": ISODate("2016-03-17T10:59:16.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e045f66fbf410000407"),
  "auto_id": NumberInt(135),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(436),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(2),
  "flat_id": NumberInt(128),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:16.0Z"),
  "created": ISODate("2016-03-17T10:59:16.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e045f66fbf410000408"),
  "auto_id": NumberInt(136),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(437),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(2),
  "flat_id": NumberInt(129),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:16.0Z"),
  "created": ISODate("2016-03-17T10:59:16.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e045f66fbf410000409"),
  "auto_id": NumberInt(137),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(438),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(2),
  "flat_id": NumberInt(130),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:16.0Z"),
  "created": ISODate("2016-03-17T10:59:16.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e045f66fbf41000040a"),
  "auto_id": NumberInt(138),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(439),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(2),
  "flat_id": NumberInt(131),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:16.0Z"),
  "created": ISODate("2016-03-17T10:59:16.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e045f66fbf41000040b"),
  "auto_id": NumberInt(139),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(544),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(2),
  "flat_id": NumberInt(132),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:16.0Z"),
  "created": ISODate("2016-03-17T10:59:16.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e045f66fbf41000040c"),
  "auto_id": NumberInt(140),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(545),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(2),
  "flat_id": NumberInt(133),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:16.0Z"),
  "created": ISODate("2016-03-17T10:59:16.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e045f66fbf41000040d"),
  "auto_id": NumberInt(141),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(440),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(2),
  "flat_id": NumberInt(134),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:16.0Z"),
  "created": ISODate("2016-03-17T10:59:16.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e045f66fbf41000040e"),
  "auto_id": NumberInt(142),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(441),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(2),
  "flat_id": NumberInt(135),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:16.0Z"),
  "created": ISODate("2016-03-17T10:59:16.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e045f66fbf41000040f"),
  "auto_id": NumberInt(143),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(546),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(2),
  "flat_id": NumberInt(136),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:16.0Z"),
  "created": ISODate("2016-03-17T10:59:16.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e045f66fbf410000410"),
  "auto_id": NumberInt(144),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(547),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(2),
  "flat_id": NumberInt(137),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:16.0Z"),
  "created": ISODate("2016-03-17T10:59:16.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e045f66fbf410000411"),
  "auto_id": NumberInt(145),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(548),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(2),
  "flat_id": NumberInt(138),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:16.0Z"),
  "created": ISODate("2016-03-17T10:59:16.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e045f66fbf410000412"),
  "auto_id": NumberInt(146),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(549),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(2),
  "flat_id": NumberInt(139),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:16.0Z"),
  "created": ISODate("2016-03-17T10:59:16.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e045f66fbf410000413"),
  "auto_id": NumberInt(147),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(550),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(2),
  "flat_id": NumberInt(140),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:16.0Z"),
  "created": ISODate("2016-03-17T10:59:16.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e045f66fbf410000414"),
  "auto_id": NumberInt(148),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(551),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(2),
  "flat_id": NumberInt(141),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:16.0Z"),
  "created": ISODate("2016-03-17T10:59:16.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e045f66fbf410000415"),
  "auto_id": NumberInt(149),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(552),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(2),
  "flat_id": NumberInt(142),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:16.0Z"),
  "created": ISODate("2016-03-17T10:59:16.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e045f66fbf410000416"),
  "auto_id": NumberInt(150),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(553),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(2),
  "flat_id": NumberInt(143),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:16.0Z"),
  "created": ISODate("2016-03-17T10:59:16.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e045f66fbf410000417"),
  "auto_id": NumberInt(151),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(554),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(2),
  "flat_id": NumberInt(144),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:16.0Z"),
  "created": ISODate("2016-03-17T10:59:16.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e045f66fbf410000418"),
  "auto_id": NumberInt(152),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(555),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(2),
  "flat_id": NumberInt(145),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:16.0Z"),
  "created": ISODate("2016-03-17T10:59:16.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e045f66fbf410000419"),
  "auto_id": NumberInt(153),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(556),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(2),
  "flat_id": NumberInt(146),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:16.0Z"),
  "created": ISODate("2016-03-17T10:59:16.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e045f66fbf41000041a"),
  "auto_id": NumberInt(154),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(557),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(2),
  "flat_id": NumberInt(147),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:16.0Z"),
  "created": ISODate("2016-03-17T10:59:16.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e055f66fbf41000041b"),
  "auto_id": NumberInt(155),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(558),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(2),
  "flat_id": NumberInt(148),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:17.0Z"),
  "created": ISODate("2016-03-17T10:59:17.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e055f66fbf41000041c"),
  "auto_id": NumberInt(156),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(559),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(2),
  "flat_id": NumberInt(149),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:17.0Z"),
  "created": ISODate("2016-03-17T10:59:17.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e055f66fbf41000041d"),
  "auto_id": NumberInt(157),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(560),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(2),
  "flat_id": NumberInt(150),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:17.0Z"),
  "created": ISODate("2016-03-17T10:59:17.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e055f66fbf41000041e"),
  "auto_id": NumberInt(158),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(561),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(2),
  "flat_id": NumberInt(151),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:17.0Z"),
  "created": ISODate("2016-03-17T10:59:17.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e055f66fbf41000041f"),
  "auto_id": NumberInt(159),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(562),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(2),
  "flat_id": NumberInt(152),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:17.0Z"),
  "created": ISODate("2016-03-17T10:59:17.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e055f66fbf410000420"),
  "auto_id": NumberInt(160),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(563),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(2),
  "flat_id": NumberInt(153),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:17.0Z"),
  "created": ISODate("2016-03-17T10:59:17.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e055f66fbf410000421"),
  "auto_id": NumberInt(161),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(564),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(2),
  "flat_id": NumberInt(154),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:17.0Z"),
  "created": ISODate("2016-03-17T10:59:17.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e055f66fbf410000422"),
  "auto_id": NumberInt(162),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(565),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(2),
  "flat_id": NumberInt(155),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:17.0Z"),
  "created": ISODate("2016-03-17T10:59:17.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e055f66fbf410000423"),
  "auto_id": NumberInt(163),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(566),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(2),
  "flat_id": NumberInt(156),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:17.0Z"),
  "created": ISODate("2016-03-17T10:59:17.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e055f66fbf410000424"),
  "auto_id": NumberInt(164),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(567),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(2),
  "flat_id": NumberInt(157),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:17.0Z"),
  "created": ISODate("2016-03-17T10:59:17.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e055f66fbf410000425"),
  "auto_id": NumberInt(165),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(568),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(2),
  "flat_id": NumberInt(158),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:17.0Z"),
  "created": ISODate("2016-03-17T10:59:17.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e055f66fbf410000426"),
  "auto_id": NumberInt(166),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(569),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(2),
  "flat_id": NumberInt(159),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:17.0Z"),
  "created": ISODate("2016-03-17T10:59:17.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e055f66fbf410000427"),
  "auto_id": NumberInt(167),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(570),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(2),
  "flat_id": NumberInt(160),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:17.0Z"),
  "created": ISODate("2016-03-17T10:59:17.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e055f66fbf410000428"),
  "auto_id": NumberInt(168),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(571),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(2),
  "flat_id": NumberInt(161),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:17.0Z"),
  "created": ISODate("2016-03-17T10:59:17.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e055f66fbf410000429"),
  "auto_id": NumberInt(169),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(572),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(2),
  "flat_id": NumberInt(162),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:17.0Z"),
  "created": ISODate("2016-03-17T10:59:17.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e055f66fbf41000042a"),
  "auto_id": NumberInt(170),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(573),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(2),
  "flat_id": NumberInt(163),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:17.0Z"),
  "created": ISODate("2016-03-17T10:59:17.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e055f66fbf41000042b"),
  "auto_id": NumberInt(171),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(574),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(2),
  "flat_id": NumberInt(164),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:17.0Z"),
  "created": ISODate("2016-03-17T10:59:17.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e055f66fbf41000042c"),
  "auto_id": NumberInt(172),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(575),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(2),
  "flat_id": NumberInt(165),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:17.0Z"),
  "created": ISODate("2016-03-17T10:59:17.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e055f66fbf41000042d"),
  "auto_id": NumberInt(173),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(576),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(2),
  "flat_id": NumberInt(166),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:17.0Z"),
  "created": ISODate("2016-03-17T10:59:17.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e055f66fbf41000042e"),
  "auto_id": NumberInt(174),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(577),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(2),
  "flat_id": NumberInt(167),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:17.0Z"),
  "created": ISODate("2016-03-17T10:59:17.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e055f66fbf41000042f"),
  "auto_id": NumberInt(175),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(578),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(2),
  "flat_id": NumberInt(168),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:17.0Z"),
  "created": ISODate("2016-03-17T10:59:17.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e055f66fbf410000430"),
  "auto_id": NumberInt(176),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(579),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(2),
  "flat_id": NumberInt(169),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:17.0Z"),
  "created": ISODate("2016-03-17T10:59:17.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e055f66fbf410000431"),
  "auto_id": NumberInt(177),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(580),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(2),
  "flat_id": NumberInt(170),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:17.0Z"),
  "created": ISODate("2016-03-17T10:59:17.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e065f66fbf410000432"),
  "auto_id": NumberInt(178),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(581),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(2),
  "flat_id": NumberInt(171),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:18.0Z"),
  "created": ISODate("2016-03-17T10:59:18.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e065f66fbf410000433"),
  "auto_id": NumberInt(179),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(582),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(2),
  "flat_id": NumberInt(172),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:18.0Z"),
  "created": ISODate("2016-03-17T10:59:18.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e065f66fbf410000434"),
  "auto_id": NumberInt(180),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(583),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(2),
  "flat_id": NumberInt(173),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:18.0Z"),
  "created": ISODate("2016-03-17T10:59:18.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e065f66fbf410000435"),
  "auto_id": NumberInt(181),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(584),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(2),
  "flat_id": NumberInt(174),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:18.0Z"),
  "created": ISODate("2016-03-17T10:59:18.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e065f66fbf410000436"),
  "auto_id": NumberInt(182),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(585),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(2),
  "flat_id": NumberInt(175),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:18.0Z"),
  "created": ISODate("2016-03-17T10:59:18.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e065f66fbf410000437"),
  "auto_id": NumberInt(183),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(586),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(2),
  "flat_id": NumberInt(176),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:18.0Z"),
  "created": ISODate("2016-03-17T10:59:18.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e065f66fbf410000438"),
  "auto_id": NumberInt(184),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(587),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(2),
  "flat_id": NumberInt(177),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:18.0Z"),
  "created": ISODate("2016-03-17T10:59:18.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e065f66fbf410000439"),
  "auto_id": NumberInt(185),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(588),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(2),
  "flat_id": NumberInt(178),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:18.0Z"),
  "created": ISODate("2016-03-17T10:59:18.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e065f66fbf41000043a"),
  "auto_id": NumberInt(186),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(589),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(2),
  "flat_id": NumberInt(179),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:18.0Z"),
  "created": ISODate("2016-03-17T10:59:18.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e065f66fbf41000043b"),
  "auto_id": NumberInt(187),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(590),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(2),
  "flat_id": NumberInt(180),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:18.0Z"),
  "created": ISODate("2016-03-17T10:59:18.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e065f66fbf41000043c"),
  "auto_id": NumberInt(188),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(591),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(2),
  "flat_id": NumberInt(181),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:18.0Z"),
  "created": ISODate("2016-03-17T10:59:18.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e065f66fbf41000043d"),
  "auto_id": NumberInt(189),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(592),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(2),
  "flat_id": NumberInt(182),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:18.0Z"),
  "created": ISODate("2016-03-17T10:59:18.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e065f66fbf41000043e"),
  "auto_id": NumberInt(190),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(593),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(2),
  "flat_id": NumberInt(183),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:18.0Z"),
  "created": ISODate("2016-03-17T10:59:18.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e065f66fbf41000043f"),
  "auto_id": NumberInt(191),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(594),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(2),
  "flat_id": NumberInt(184),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:18.0Z"),
  "created": ISODate("2016-03-17T10:59:18.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e065f66fbf410000440"),
  "auto_id": NumberInt(192),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(595),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(2),
  "flat_id": NumberInt(185),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:18.0Z"),
  "created": ISODate("2016-03-17T10:59:18.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e065f66fbf410000441"),
  "auto_id": NumberInt(193),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(596),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(2),
  "flat_id": NumberInt(186),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:18.0Z"),
  "created": ISODate("2016-03-17T10:59:18.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e065f66fbf410000442"),
  "auto_id": NumberInt(194),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(597),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(2),
  "flat_id": NumberInt(187),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:18.0Z"),
  "created": ISODate("2016-03-17T10:59:18.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e065f66fbf410000443"),
  "auto_id": NumberInt(195),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(598),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(2),
  "flat_id": NumberInt(188),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:18.0Z"),
  "created": ISODate("2016-03-17T10:59:18.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e065f66fbf410000444"),
  "auto_id": NumberInt(196),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(599),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(2),
  "flat_id": NumberInt(189),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:18.0Z"),
  "created": ISODate("2016-03-17T10:59:18.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e065f66fbf410000445"),
  "auto_id": NumberInt(197),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(600),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(2),
  "flat_id": NumberInt(190),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:18.0Z"),
  "created": ISODate("2016-03-17T10:59:18.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e065f66fbf410000446"),
  "auto_id": NumberInt(198),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(601),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(2),
  "flat_id": NumberInt(191),
  "debit": "100",
  "credit": "",
  "penalty": "100",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:18.0Z"),
  "created": ISODate("2016-03-17T10:59:18.0Z")
});
db.getCollection("opening_balance_csv_converteds").insert({
  "_id": ObjectId("56ea8e075f66fbf410000447"),
  "auto_id": NumberInt(199),
  "group_id": NumberInt(34),
  "ledger_id": NumberInt(602),
  "ledger_type": NumberInt(1),
  "wing_id": NumberInt(2),
  "flat_id": NumberInt(192),
  "debit": "",
  "credit": "39600",
  "penalty": "",
  "society_id": NumberInt(7),
  "is_imported": "NO",
  "modified": ISODate("2016-03-17T10:59:19.0Z"),
  "created": ISODate("2016-03-17T10:59:19.0Z")
});

/** regular_bill_temps records **/
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f875f66fb300f00010d"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(16),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:15.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(254),
  "modified": ISODate("2016-03-12T13:54:15.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f885f66fb300f00010e"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(17),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:16.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(255),
  "modified": ISODate("2016-03-12T13:54:16.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f885f66fb300f00010f"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(18),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:16.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(256),
  "modified": ISODate("2016-03-12T13:54:16.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f885f66fb300f000110"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(19),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:16.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(257),
  "modified": ISODate("2016-03-12T13:54:16.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f885f66fb300f000111"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(20),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:16.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(258),
  "modified": ISODate("2016-03-12T13:54:16.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f885f66fb300f000112"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(21),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:16.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(259),
  "modified": ISODate("2016-03-12T13:54:16.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f885f66fb300f000113"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(22),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:16.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(261),
  "modified": ISODate("2016-03-12T13:54:16.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f885f66fb300f000114"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(23),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:16.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(260),
  "modified": ISODate("2016-03-12T13:54:16.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f885f66fb300f000115"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(24),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:16.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(262),
  "modified": ISODate("2016-03-12T13:54:16.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f885f66fb300f000116"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(25),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:16.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(263),
  "modified": ISODate("2016-03-12T13:54:16.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f885f66fb300f000117"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(26),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:16.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(264),
  "modified": ISODate("2016-03-12T13:54:16.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f885f66fb300f000118"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(27),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:16.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(265),
  "modified": ISODate("2016-03-12T13:54:16.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f885f66fb300f000119"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(28),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:16.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(266),
  "modified": ISODate("2016-03-12T13:54:16.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f885f66fb300f00011a"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(29),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:16.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(267),
  "modified": ISODate("2016-03-12T13:54:16.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f885f66fb300f00011b"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(30),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:16.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(268),
  "modified": ISODate("2016-03-12T13:54:16.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f885f66fb300f00011c"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(31),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:16.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(269),
  "modified": ISODate("2016-03-12T13:54:16.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f885f66fb300f00011d"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(32),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:16.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(270),
  "modified": ISODate("2016-03-12T13:54:16.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f885f66fb300f00011e"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(33),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:16.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(271),
  "modified": ISODate("2016-03-12T13:54:16.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f885f66fb300f00011f"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(34),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:16.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(272),
  "modified": ISODate("2016-03-12T13:54:16.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f885f66fb300f000120"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(35),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:16.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(273),
  "modified": ISODate("2016-03-12T13:54:16.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f895f66fb300f000121"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(36),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:17.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(274),
  "modified": ISODate("2016-03-12T13:54:17.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f895f66fb300f000122"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(37),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:17.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(275),
  "modified": ISODate("2016-03-12T13:54:17.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f895f66fb300f000123"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(38),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:17.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(276),
  "modified": ISODate("2016-03-12T13:54:17.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f895f66fb300f000124"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(39),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:17.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(277),
  "modified": ISODate("2016-03-12T13:54:17.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f895f66fb300f000125"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(40),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:17.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(278),
  "modified": ISODate("2016-03-12T13:54:17.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f895f66fb300f000126"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(41),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:17.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(279),
  "modified": ISODate("2016-03-12T13:54:17.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f895f66fb300f000127"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(42),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:17.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(280),
  "modified": ISODate("2016-03-12T13:54:17.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f895f66fb300f000128"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(43),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:17.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(281),
  "modified": ISODate("2016-03-12T13:54:17.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f895f66fb300f000129"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(44),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:17.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(282),
  "modified": ISODate("2016-03-12T13:54:17.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f895f66fb300f00012a"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(45),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:17.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(283),
  "modified": ISODate("2016-03-12T13:54:17.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f895f66fb300f00012b"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(46),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:17.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(284),
  "modified": ISODate("2016-03-12T13:54:17.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f895f66fb300f00012c"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(47),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:17.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(285),
  "modified": ISODate("2016-03-12T13:54:17.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f895f66fb300f00012d"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(48),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:17.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(286),
  "modified": ISODate("2016-03-12T13:54:17.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f895f66fb300f00012e"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(49),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:17.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(287),
  "modified": ISODate("2016-03-12T13:54:17.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f895f66fb300f00012f"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(50),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:17.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(288),
  "modified": ISODate("2016-03-12T13:54:17.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f8a5f66fb300f000135"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(56),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:18.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(294),
  "modified": ISODate("2016-03-12T13:54:18.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f8a5f66fb300f000136"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(57),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:18.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(295),
  "modified": ISODate("2016-03-12T13:54:18.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f8a5f66fb300f000137"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(58),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:18.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(200),
  "modified": ISODate("2016-03-12T13:54:18.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f8a5f66fb300f000138"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(59),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:18.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(201),
  "modified": ISODate("2016-03-12T13:54:18.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f8a5f66fb300f000139"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(60),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:18.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(202),
  "modified": ISODate("2016-03-12T13:54:18.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f8a5f66fb300f00013a"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(61),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:18.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(203),
  "modified": ISODate("2016-03-12T13:54:18.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f8a5f66fb300f00013b"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(62),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:18.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(204),
  "modified": ISODate("2016-03-12T13:54:18.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f8a5f66fb300f00013c"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(63),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:18.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(296),
  "modified": ISODate("2016-03-12T13:54:18.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f8a5f66fb300f00013d"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(64),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:18.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(205),
  "modified": ISODate("2016-03-12T13:54:18.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f8a5f66fb300f00013e"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(65),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:18.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(206),
  "modified": ISODate("2016-03-12T13:54:18.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f8a5f66fb300f00013f"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(66),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:18.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(207),
  "modified": ISODate("2016-03-12T13:54:18.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f8a5f66fb300f000140"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(67),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:18.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(208),
  "modified": ISODate("2016-03-12T13:54:18.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f8a5f66fb300f000141"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(68),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:18.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(297),
  "modified": ISODate("2016-03-12T13:54:18.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f8a5f66fb300f000142"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(69),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:18.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(209),
  "modified": ISODate("2016-03-12T13:54:18.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f8a5f66fb300f000143"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(70),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:18.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(298),
  "modified": ISODate("2016-03-12T13:54:18.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f8a5f66fb300f000144"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(71),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:18.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(210),
  "modified": ISODate("2016-03-12T13:54:18.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f8a5f66fb300f000145"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(72),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:18.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(299),
  "modified": ISODate("2016-03-12T13:54:18.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f8b5f66fb300f000146"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(73),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:19.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(211),
  "modified": ISODate("2016-03-12T13:54:19.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f8b5f66fb300f000147"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(74),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:19.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(212),
  "modified": ISODate("2016-03-12T13:54:19.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f8b5f66fb300f000148"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(75),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:19.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(213),
  "modified": ISODate("2016-03-12T13:54:19.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f8b5f66fb300f000149"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(76),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:19.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(214),
  "modified": ISODate("2016-03-12T13:54:19.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f8b5f66fb300f00014a"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(77),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:19.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(300),
  "modified": ISODate("2016-03-12T13:54:19.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f8b5f66fb300f00014b"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(78),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:19.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(215),
  "modified": ISODate("2016-03-12T13:54:19.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f8b5f66fb300f00014c"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(79),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:19.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(301),
  "modified": ISODate("2016-03-12T13:54:19.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f8b5f66fb300f00014d"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(80),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:19.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(216),
  "modified": ISODate("2016-03-12T13:54:19.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f8b5f66fb300f00014e"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(81),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:19.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(217),
  "modified": ISODate("2016-03-12T13:54:19.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f8b5f66fb300f00014f"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(82),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:19.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(218),
  "modified": ISODate("2016-03-12T13:54:19.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f8b5f66fb300f000150"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(83),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:19.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(219),
  "modified": ISODate("2016-03-12T13:54:19.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f8b5f66fb300f000151"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(84),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:19.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(220),
  "modified": ISODate("2016-03-12T13:54:19.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f8b5f66fb300f000152"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(85),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:19.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(302),
  "modified": ISODate("2016-03-12T13:54:19.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f8b5f66fb300f000153"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(86),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:19.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(221),
  "modified": ISODate("2016-03-12T13:54:19.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f8b5f66fb300f000154"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(87),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:19.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(222),
  "modified": ISODate("2016-03-12T13:54:19.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f8b5f66fb300f000155"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(88),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:19.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(223),
  "modified": ISODate("2016-03-12T13:54:19.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f8b5f66fb300f000156"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(89),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:19.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(303),
  "modified": ISODate("2016-03-12T13:54:19.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f8b5f66fb300f000157"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(90),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:19.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(224),
  "modified": ISODate("2016-03-12T13:54:19.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f8b5f66fb300f000158"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(91),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:19.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(225),
  "modified": ISODate("2016-03-12T13:54:19.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f8c5f66fb300f000159"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(92),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:20.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(226),
  "modified": ISODate("2016-03-12T13:54:20.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f8c5f66fb300f00015a"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(93),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:20.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(227),
  "modified": ISODate("2016-03-12T13:54:20.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f8c5f66fb300f00015b"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(94),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:20.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(228),
  "modified": ISODate("2016-03-12T13:54:20.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f8c5f66fb300f00015c"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(95),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:20.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(229),
  "modified": ISODate("2016-03-12T13:54:20.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f8c5f66fb300f00015d"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(96),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:20.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(230),
  "modified": ISODate("2016-03-12T13:54:20.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f8c5f66fb300f00015e"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(97),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:20.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(231),
  "modified": ISODate("2016-03-12T13:54:20.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f8c5f66fb300f00015f"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(98),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:20.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(304),
  "modified": ISODate("2016-03-12T13:54:20.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f8c5f66fb300f000160"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(99),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:20.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(232),
  "modified": ISODate("2016-03-12T13:54:20.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f8c5f66fb300f000161"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(100),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:20.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(305),
  "modified": ISODate("2016-03-12T13:54:20.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f8c5f66fb300f000162"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(101),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:20.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(233),
  "modified": ISODate("2016-03-12T13:54:20.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f8d5f66fb300f00016b"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(110),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:21.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(309),
  "modified": ISODate("2016-03-12T13:54:21.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f8d5f66fb300f00016c"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(111),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:21.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(310),
  "modified": ISODate("2016-03-12T13:54:21.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f8d5f66fb300f00016d"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(112),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:21.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(311),
  "modified": ISODate("2016-03-12T13:54:21.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f8d5f66fb300f00016e"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(113),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:21.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(312),
  "modified": ISODate("2016-03-12T13:54:21.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f8d5f66fb300f00016f"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(114),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:21.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(313),
  "modified": ISODate("2016-03-12T13:54:21.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f8d5f66fb300f000170"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(115),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:21.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(314),
  "modified": ISODate("2016-03-12T13:54:21.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f8d5f66fb300f000171"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(116),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:21.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(315),
  "modified": ISODate("2016-03-12T13:54:21.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f8d5f66fb300f000172"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(117),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:21.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(316),
  "modified": ISODate("2016-03-12T13:54:21.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f8d5f66fb300f000173"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(118),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:21.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(317),
  "modified": ISODate("2016-03-12T13:54:21.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f8d5f66fb300f000174"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(119),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:21.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(318),
  "modified": ISODate("2016-03-12T13:54:21.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f8d5f66fb300f000175"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(120),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:21.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(319),
  "modified": ISODate("2016-03-12T13:54:21.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f8d5f66fb300f000176"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(121),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:21.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(320),
  "modified": ISODate("2016-03-12T13:54:21.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f8d5f66fb300f000177"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(122),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:21.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(321),
  "modified": ISODate("2016-03-12T13:54:21.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f8d5f66fb300f000178"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(123),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:21.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(322),
  "modified": ISODate("2016-03-12T13:54:21.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f8d5f66fb300f000179"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(124),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:21.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(323),
  "modified": ISODate("2016-03-12T13:54:21.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f8d5f66fb300f00017a"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(125),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:21.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(324),
  "modified": ISODate("2016-03-12T13:54:21.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f8d5f66fb300f00017b"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(126),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:21.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(325),
  "modified": ISODate("2016-03-12T13:54:21.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f8d5f66fb300f00017c"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(127),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:21.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(326),
  "modified": ISODate("2016-03-12T13:54:21.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f8e5f66fb300f00017d"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(128),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:22.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(327),
  "modified": ISODate("2016-03-12T13:54:22.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f8e5f66fb300f00017e"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(129),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:22.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(328),
  "modified": ISODate("2016-03-12T13:54:22.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f8e5f66fb300f00017f"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(130),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:22.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(329),
  "modified": ISODate("2016-03-12T13:54:22.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f8e5f66fb300f000180"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(131),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:22.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(330),
  "modified": ISODate("2016-03-12T13:54:22.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f8e5f66fb300f000181"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(132),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:22.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(331),
  "modified": ISODate("2016-03-12T13:54:22.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f8e5f66fb300f000182"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(133),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:22.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(332),
  "modified": ISODate("2016-03-12T13:54:22.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f8e5f66fb300f000183"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(134),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:22.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(333),
  "modified": ISODate("2016-03-12T13:54:22.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f8e5f66fb300f000184"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(135),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:22.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(334),
  "modified": ISODate("2016-03-12T13:54:22.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f8e5f66fb300f000185"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(136),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:22.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(335),
  "modified": ISODate("2016-03-12T13:54:22.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f8e5f66fb300f000186"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(137),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:22.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(336),
  "modified": ISODate("2016-03-12T13:54:22.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f8e5f66fb300f000187"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(138),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:22.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(337),
  "modified": ISODate("2016-03-12T13:54:22.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f8e5f66fb300f000188"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(139),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:22.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(338),
  "modified": ISODate("2016-03-12T13:54:22.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f8e5f66fb300f000189"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(140),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:22.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(339),
  "modified": ISODate("2016-03-12T13:54:22.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f8e5f66fb300f00018a"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(141),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:22.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(340),
  "modified": ISODate("2016-03-12T13:54:22.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f8e5f66fb300f00018b"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(142),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:22.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(341),
  "modified": ISODate("2016-03-12T13:54:22.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f8e5f66fb300f00018c"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(143),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:22.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(342),
  "modified": ISODate("2016-03-12T13:54:22.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f8e5f66fb300f00018d"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(144),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:22.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(343),
  "modified": ISODate("2016-03-12T13:54:22.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f8e5f66fb300f00018e"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(145),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:22.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(344),
  "modified": ISODate("2016-03-12T13:54:22.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f8e5f66fb300f00018f"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(146),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:22.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(345),
  "modified": ISODate("2016-03-12T13:54:22.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f8f5f66fb300f000190"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(147),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:23.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(346),
  "modified": ISODate("2016-03-12T13:54:23.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f8f5f66fb300f000191"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(148),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:23.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(347),
  "modified": ISODate("2016-03-12T13:54:23.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f8f5f66fb300f000192"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(149),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:23.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(348),
  "modified": ISODate("2016-03-12T13:54:23.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f8f5f66fb300f000193"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(150),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:23.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(349),
  "modified": ISODate("2016-03-12T13:54:23.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f8f5f66fb300f000194"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(151),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:23.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(350),
  "modified": ISODate("2016-03-12T13:54:23.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f8f5f66fb300f000195"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(152),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:23.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(351),
  "modified": ISODate("2016-03-12T13:54:23.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f8f5f66fb300f000196"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(153),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:23.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(352),
  "modified": ISODate("2016-03-12T13:54:23.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f8f5f66fb300f000197"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(154),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:23.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(353),
  "modified": ISODate("2016-03-12T13:54:23.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f8f5f66fb300f000198"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(155),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:23.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(354),
  "modified": ISODate("2016-03-12T13:54:23.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f8f5f66fb300f000199"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(156),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:23.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(355),
  "modified": ISODate("2016-03-12T13:54:23.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f8f5f66fb300f00019a"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(157),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:23.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(356),
  "modified": ISODate("2016-03-12T13:54:23.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f8f5f66fb300f00019b"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(158),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:23.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(357),
  "modified": ISODate("2016-03-12T13:54:23.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f8f5f66fb300f00019c"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(159),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:23.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(358),
  "modified": ISODate("2016-03-12T13:54:23.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f8f5f66fb300f00019d"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(160),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:23.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(359),
  "modified": ISODate("2016-03-12T13:54:23.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f8f5f66fb300f00019e"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(161),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:23.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(360),
  "modified": ISODate("2016-03-12T13:54:23.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f8f5f66fb300f00019f"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(162),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:23.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(361),
  "modified": ISODate("2016-03-12T13:54:23.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f8f5f66fb300f0001a0"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(163),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:23.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(362),
  "modified": ISODate("2016-03-12T13:54:23.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f8f5f66fb300f0001a1"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(164),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:23.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(363),
  "modified": ISODate("2016-03-12T13:54:23.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f905f66fb300f0001a2"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(165),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:24.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(364),
  "modified": ISODate("2016-03-12T13:54:24.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f905f66fb300f0001a3"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(166),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:24.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(365),
  "modified": ISODate("2016-03-12T13:54:24.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f905f66fb300f0001a4"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(167),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:24.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(366),
  "modified": ISODate("2016-03-12T13:54:24.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f905f66fb300f0001a5"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(168),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:24.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(367),
  "modified": ISODate("2016-03-12T13:54:24.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f905f66fb300f0001a6"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(169),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:24.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(368),
  "modified": ISODate("2016-03-12T13:54:24.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f905f66fb300f0001a7"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(170),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:24.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(369),
  "modified": ISODate("2016-03-12T13:54:24.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f905f66fb300f0001a8"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(171),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:24.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(370),
  "modified": ISODate("2016-03-12T13:54:24.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f905f66fb300f0001a9"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(172),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:24.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(371),
  "modified": ISODate("2016-03-12T13:54:24.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f905f66fb300f0001aa"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(173),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:24.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(372),
  "modified": ISODate("2016-03-12T13:54:24.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f905f66fb300f0001ab"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(174),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:24.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(373),
  "modified": ISODate("2016-03-12T13:54:24.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f905f66fb300f0001ac"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(175),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:24.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(374),
  "modified": ISODate("2016-03-12T13:54:24.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f905f66fb300f0001ad"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(176),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:24.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(375),
  "modified": ISODate("2016-03-12T13:54:24.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f905f66fb300f0001ae"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(177),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:24.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(376),
  "modified": ISODate("2016-03-12T13:54:24.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f905f66fb300f0001af"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(178),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:24.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(377),
  "modified": ISODate("2016-03-12T13:54:24.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f905f66fb300f0001b0"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(179),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:24.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(378),
  "modified": ISODate("2016-03-12T13:54:24.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f905f66fb300f0001b1"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(180),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:24.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(379),
  "modified": ISODate("2016-03-12T13:54:24.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f905f66fb300f0001b2"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(181),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:24.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(380),
  "modified": ISODate("2016-03-12T13:54:24.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f905f66fb300f0001b3"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(182),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:24.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(381),
  "modified": ISODate("2016-03-12T13:54:24.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f915f66fb300f0001b4"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(183),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:25.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(382),
  "modified": ISODate("2016-03-12T13:54:25.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f915f66fb300f0001b5"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(184),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:25.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(383),
  "modified": ISODate("2016-03-12T13:54:25.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f915f66fb300f0001b6"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(185),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:25.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(384),
  "modified": ISODate("2016-03-12T13:54:25.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f915f66fb300f0001b7"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(186),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:25.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(385),
  "modified": ISODate("2016-03-12T13:54:25.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f915f66fb300f0001b8"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(187),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:25.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(386),
  "modified": ISODate("2016-03-12T13:54:25.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f915f66fb300f0001b9"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(188),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:25.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(387),
  "modified": ISODate("2016-03-12T13:54:25.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f915f66fb300f0001ba"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(189),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:25.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(388),
  "modified": ISODate("2016-03-12T13:54:25.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f915f66fb300f0001bb"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(190),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:25.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(389),
  "modified": ISODate("2016-03-12T13:54:25.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f915f66fb300f0001bc"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(191),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:25.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(390),
  "modified": ISODate("2016-03-12T13:54:25.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f915f66fb300f0001bd"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(192),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:25.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(391),
  "modified": ISODate("2016-03-12T13:54:25.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f915f66fb300f0001be"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(193),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:25.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(392),
  "modified": ISODate("2016-03-12T13:54:25.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f915f66fb300f0001bf"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(194),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:25.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(393),
  "modified": ISODate("2016-03-12T13:54:25.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f915f66fb300f0001c0"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(195),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:25.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(394),
  "modified": ISODate("2016-03-12T13:54:25.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f915f66fb300f0001c1"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(196),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:25.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(395),
  "modified": ISODate("2016-03-12T13:54:25.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f915f66fb300f0001c2"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(197),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:25.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(396),
  "modified": ISODate("2016-03-12T13:54:25.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f915f66fb300f0001c3"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(198),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:25.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(397),
  "modified": ISODate("2016-03-12T13:54:25.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f915f66fb300f0001c4"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(199),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:25.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": NumberInt(0),
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(398),
  "modified": ISODate("2016-03-12T13:54:25.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});
db.getCollection("regular_bill_temps").insert({
  "_id": ObjectId("56e41f915f66fb300f0001c5"),
  "approved": "no",
  "arrear_intrest": NumberInt(0),
  "arrear_maintenance": NumberInt(0),
  "auto_id": NumberInt(200),
  "billing_cycle": "3",
  "created": ISODate("2016-03-12T13:54:25.0Z"),
  "created_by": NumberInt(247),
  "credit_stock": 0,
  "current_date": NumberInt(1457721000),
  "description": "Bill for first quarter",
  "due_date": NumberInt(1429036200),
  "due_for_payment": 34500,
  "end_date": NumberInt(1435602600),
  "income_head_array": {
    "110": 15000,
    "92": 3750,
    "38": 15000
  },
  "intrest_on_arrears": 0,
  "ledger_sub_account_id": NumberInt(399),
  "modified": ISODate("2016-03-12T13:54:25.0Z"),
  "noc_charge": 750,
  "other_charge": [
    
  ],
  "sent_for_approval": "yes",
  "society_id": NumberInt(5),
  "start_date": NumberInt(1427826600),
  "total": 34500
});

/** roles records **/
db.getCollection("roles").insert({
  "_id": ObjectId("56e27f7c5f66fbe41200009c"),
  "auto_id": NumberInt(1),
  "role_name": "Admin",
  "role_id": NumberInt(1),
  "society_id": NumberInt(3),
  "modified": ISODate("2016-03-11T08:19:08.0Z"),
  "created": ISODate("2016-03-11T08:19:08.0Z")
});
db.getCollection("roles").insert({
  "_id": ObjectId("56e27f7c5f66fbe41200009d"),
  "auto_id": NumberInt(2),
  "role_name": "Committee member",
  "role_id": NumberInt(2),
  "society_id": NumberInt(3),
  "modified": ISODate("2016-03-11T08:19:08.0Z"),
  "created": ISODate("2016-03-11T08:19:08.0Z")
});
db.getCollection("roles").insert({
  "_id": ObjectId("56e27f7c5f66fbe41200009e"),
  "auto_id": NumberInt(3),
  "role_name": "Owner",
  "role_id": NumberInt(3),
  "society_id": NumberInt(3),
  "modified": ISODate("2016-03-11T08:19:08.0Z"),
  "created": ISODate("2016-03-11T08:19:08.0Z")
});
db.getCollection("roles").insert({
  "_id": ObjectId("56e27f7c5f66fbe41200009f"),
  "auto_id": NumberInt(4),
  "role_name": "Tenant",
  "role_id": NumberInt(4),
  "society_id": NumberInt(3),
  "modified": ISODate("2016-03-11T08:19:08.0Z"),
  "created": ISODate("2016-03-11T08:19:08.0Z")
});
db.getCollection("roles").insert({
  "_id": ObjectId("56e27f7c5f66fbe4120000a0"),
  "auto_id": NumberInt(5),
  "role_name": "Owner family member",
  "role_id": NumberInt(5),
  "society_id": NumberInt(3),
  "modified": ISODate("2016-03-11T08:19:08.0Z"),
  "created": ISODate("2016-03-11T08:19:08.0Z")
});
db.getCollection("roles").insert({
  "_id": ObjectId("56e27f7c5f66fbe4120000a1"),
  "auto_id": NumberInt(6),
  "role_name": "Tenant Family Member",
  "role_id": NumberInt(6),
  "society_id": NumberInt(3),
  "modified": ISODate("2016-03-11T08:19:08.0Z"),
  "created": ISODate("2016-03-11T08:19:08.0Z")
});
db.getCollection("roles").insert({
  "_id": ObjectId("56e3b06c5f66fb8c0d00003c"),
  "auto_id": NumberInt(7),
  "role_name": "Admin",
  "role_id": NumberInt(1),
  "society_id": NumberInt(4),
  "modified": ISODate("2016-03-12T06:00:12.0Z"),
  "created": ISODate("2016-03-12T06:00:12.0Z")
});
db.getCollection("roles").insert({
  "_id": ObjectId("56e3b06c5f66fb8c0d00003d"),
  "auto_id": NumberInt(8),
  "role_name": "Committee member",
  "role_id": NumberInt(2),
  "society_id": NumberInt(4),
  "modified": ISODate("2016-03-12T06:00:12.0Z"),
  "created": ISODate("2016-03-12T06:00:12.0Z")
});
db.getCollection("roles").insert({
  "_id": ObjectId("56e3b06c5f66fb8c0d00003e"),
  "auto_id": NumberInt(9),
  "role_name": "Owner",
  "role_id": NumberInt(3),
  "society_id": NumberInt(4),
  "modified": ISODate("2016-03-12T06:00:12.0Z"),
  "created": ISODate("2016-03-12T06:00:12.0Z")
});
db.getCollection("roles").insert({
  "_id": ObjectId("56e3b06c5f66fb8c0d00003f"),
  "auto_id": NumberInt(10),
  "role_name": "Tenant",
  "role_id": NumberInt(4),
  "society_id": NumberInt(4),
  "modified": ISODate("2016-03-12T06:00:12.0Z"),
  "created": ISODate("2016-03-12T06:00:12.0Z")
});
db.getCollection("roles").insert({
  "_id": ObjectId("56e3b06c5f66fb8c0d000040"),
  "auto_id": NumberInt(11),
  "role_name": "Owner family member",
  "role_id": NumberInt(5),
  "society_id": NumberInt(4),
  "modified": ISODate("2016-03-12T06:00:12.0Z"),
  "created": ISODate("2016-03-12T06:00:12.0Z")
});
db.getCollection("roles").insert({
  "_id": ObjectId("56e3b06c5f66fb8c0d000041"),
  "auto_id": NumberInt(12),
  "role_name": "Tenant Family Member",
  "role_id": NumberInt(6),
  "society_id": NumberInt(4),
  "modified": ISODate("2016-03-12T06:00:12.0Z"),
  "created": ISODate("2016-03-12T06:00:12.0Z")
});
db.getCollection("roles").insert({
  "_id": ObjectId("56e41af25f66fbec0f00000c"),
  "auto_id": NumberInt(13),
  "role_name": "Admin",
  "role_id": NumberInt(1),
  "society_id": NumberInt(5),
  "modified": ISODate("2016-03-12T13:34:42.0Z"),
  "created": ISODate("2016-03-12T13:34:42.0Z")
});
db.getCollection("roles").insert({
  "_id": ObjectId("56e41af25f66fbec0f00000d"),
  "auto_id": NumberInt(14),
  "role_name": "Committee member",
  "role_id": NumberInt(2),
  "society_id": NumberInt(5),
  "modified": ISODate("2016-03-12T13:34:42.0Z"),
  "created": ISODate("2016-03-12T13:34:42.0Z")
});
db.getCollection("roles").insert({
  "_id": ObjectId("56e41af25f66fbec0f00000e"),
  "auto_id": NumberInt(15),
  "role_name": "Owner",
  "role_id": NumberInt(3),
  "society_id": NumberInt(5),
  "modified": ISODate("2016-03-12T13:34:42.0Z"),
  "created": ISODate("2016-03-12T13:34:42.0Z")
});
db.getCollection("roles").insert({
  "_id": ObjectId("56e41af25f66fbec0f00000f"),
  "auto_id": NumberInt(16),
  "role_name": "Tenant",
  "role_id": NumberInt(4),
  "society_id": NumberInt(5),
  "modified": ISODate("2016-03-12T13:34:42.0Z"),
  "created": ISODate("2016-03-12T13:34:42.0Z")
});
db.getCollection("roles").insert({
  "_id": ObjectId("56e41af25f66fbec0f000010"),
  "auto_id": NumberInt(17),
  "role_name": "Owner family member",
  "role_id": NumberInt(5),
  "society_id": NumberInt(5),
  "modified": ISODate("2016-03-12T13:34:42.0Z"),
  "created": ISODate("2016-03-12T13:34:42.0Z")
});
db.getCollection("roles").insert({
  "_id": ObjectId("56e41af25f66fbec0f000011"),
  "auto_id": NumberInt(18),
  "role_name": "Tenant Family Member",
  "role_id": NumberInt(6),
  "society_id": NumberInt(5),
  "modified": ISODate("2016-03-12T13:34:42.0Z"),
  "created": ISODate("2016-03-12T13:34:42.0Z")
});
db.getCollection("roles").insert({
  "_id": ObjectId("56e68a355f66fbc80f000344"),
  "auto_id": NumberInt(19),
  "role_name": "Admin",
  "role_id": NumberInt(1),
  "society_id": NumberInt(6),
  "modified": ISODate("2016-03-14T09:53:57.0Z"),
  "created": ISODate("2016-03-14T09:53:57.0Z")
});
db.getCollection("roles").insert({
  "_id": ObjectId("56e68a355f66fbc80f000345"),
  "auto_id": NumberInt(20),
  "role_name": "Committee member",
  "role_id": NumberInt(2),
  "society_id": NumberInt(6),
  "modified": ISODate("2016-03-14T09:53:57.0Z"),
  "created": ISODate("2016-03-14T09:53:57.0Z")
});
db.getCollection("roles").insert({
  "_id": ObjectId("56e68a355f66fbc80f000346"),
  "auto_id": NumberInt(21),
  "role_name": "Owner",
  "role_id": NumberInt(3),
  "society_id": NumberInt(6),
  "modified": ISODate("2016-03-14T09:53:57.0Z"),
  "created": ISODate("2016-03-14T09:53:57.0Z")
});
db.getCollection("roles").insert({
  "_id": ObjectId("56e68a355f66fbc80f000347"),
  "auto_id": NumberInt(22),
  "role_name": "Tenant",
  "role_id": NumberInt(4),
  "society_id": NumberInt(6),
  "modified": ISODate("2016-03-14T09:53:57.0Z"),
  "created": ISODate("2016-03-14T09:53:57.0Z")
});
db.getCollection("roles").insert({
  "_id": ObjectId("56e68a355f66fbc80f000348"),
  "auto_id": NumberInt(23),
  "role_name": "Owner family member",
  "role_id": NumberInt(5),
  "society_id": NumberInt(6),
  "modified": ISODate("2016-03-14T09:53:57.0Z"),
  "created": ISODate("2016-03-14T09:53:57.0Z")
});
db.getCollection("roles").insert({
  "_id": ObjectId("56e68a365f66fbc80f000349"),
  "auto_id": NumberInt(24),
  "role_name": "Tenant Family Member",
  "role_id": NumberInt(6),
  "society_id": NumberInt(6),
  "modified": ISODate("2016-03-14T09:53:58.0Z"),
  "created": ISODate("2016-03-14T09:53:58.0Z")
});
db.getCollection("roles").insert({
  "_id": ObjectId("56ea74005f66fbc80e00000c"),
  "auto_id": NumberInt(25),
  "role_name": "Admin",
  "role_id": NumberInt(1),
  "society_id": NumberInt(7),
  "modified": ISODate("2016-03-17T09:08:16.0Z"),
  "created": ISODate("2016-03-17T09:08:16.0Z")
});
db.getCollection("roles").insert({
  "_id": ObjectId("56ea74005f66fbc80e00000d"),
  "auto_id": NumberInt(26),
  "role_name": "Committee member",
  "role_id": NumberInt(2),
  "society_id": NumberInt(7),
  "modified": ISODate("2016-03-17T09:08:16.0Z"),
  "created": ISODate("2016-03-17T09:08:16.0Z")
});
db.getCollection("roles").insert({
  "_id": ObjectId("56ea74005f66fbc80e00000e"),
  "auto_id": NumberInt(27),
  "role_name": "Owner",
  "role_id": NumberInt(3),
  "society_id": NumberInt(7),
  "modified": ISODate("2016-03-17T09:08:16.0Z"),
  "created": ISODate("2016-03-17T09:08:16.0Z")
});
db.getCollection("roles").insert({
  "_id": ObjectId("56ea74005f66fbc80e00000f"),
  "auto_id": NumberInt(28),
  "role_name": "Tenant",
  "role_id": NumberInt(4),
  "society_id": NumberInt(7),
  "modified": ISODate("2016-03-17T09:08:16.0Z"),
  "created": ISODate("2016-03-17T09:08:16.0Z")
});
db.getCollection("roles").insert({
  "_id": ObjectId("56ea74005f66fbc80e000010"),
  "auto_id": NumberInt(29),
  "role_name": "Owner family member",
  "role_id": NumberInt(5),
  "society_id": NumberInt(7),
  "modified": ISODate("2016-03-17T09:08:16.0Z"),
  "created": ISODate("2016-03-17T09:08:16.0Z")
});
db.getCollection("roles").insert({
  "_id": ObjectId("56ea74005f66fbc80e000011"),
  "auto_id": NumberInt(30),
  "role_name": "Tenant Family Member",
  "role_id": NumberInt(6),
  "society_id": NumberInt(7),
  "modified": ISODate("2016-03-17T09:08:16.0Z"),
  "created": ISODate("2016-03-17T09:08:16.0Z")
});

/** supplimentry_bills records **/
db.getCollection("supplimentry_bills").insert({
  "_id": ObjectId("56ea71615f66fbb41a000001"),
  "supplimentry_bill_id": NumberInt(1),
  "receipt_id": "S-1001",
  "company_name": null,
  "ledger_sub_account_id": "239",
  "description": "",
  "date": "2016-03-17",
  "society_id": NumberInt(5),
  "total_amount": "242",
  "income_head": "41",
  "created_by": NumberInt(247),
  "due_date": NumberInt(1458153000),
  "supplimentry_bill_type": "resident",
  "transaction_date": NumberInt(1458153000),
  "modified": ISODate("2016-03-17T08:57:05.0Z"),
  "created": ISODate("2016-03-17T08:57:05.0Z")
});
db.getCollection("supplimentry_bills").insert({
  "_id": ObjectId("56ea71615f66fbb41a000004"),
  "supplimentry_bill_id": NumberInt(2),
  "receipt_id": "S-1002",
  "company_name": null,
  "ledger_sub_account_id": "240",
  "description": "",
  "date": "2016-03-17",
  "society_id": NumberInt(5),
  "total_amount": "234",
  "income_head": "38",
  "created_by": NumberInt(247),
  "due_date": NumberInt(1458153000),
  "supplimentry_bill_type": "resident",
  "transaction_date": NumberInt(1458153000),
  "modified": ISODate("2016-03-17T08:57:05.0Z"),
  "created": ISODate("2016-03-17T08:57:05.0Z")
});

/** user_enrollment_csv_converteds records **/

/** user_roles records **/
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e27f7c5f66fbe412000093"),
  "auto_id": NumberInt(1),
  "user_id": NumberInt(2),
  "role_id": NumberInt(1),
  "default": "yes",
  "modified": ISODate("2016-03-11T08:19:08.0Z"),
  "created": ISODate("2016-03-11T08:19:08.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3b06c5f66fb8c0d000033"),
  "auto_id": NumberInt(2),
  "user_id": NumberInt(3),
  "role_id": NumberInt(1),
  "default": "yes",
  "modified": ISODate("2016-03-12T06:00:12.0Z"),
  "created": ISODate("2016-03-12T06:00:12.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e5f65f66fba81100021a"),
  "auto_id": NumberInt(3),
  "user_id": NumberInt(4),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:38.0Z"),
  "created": ISODate("2016-03-12T09:48:38.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e5f65f66fba811000225"),
  "auto_id": NumberInt(4),
  "user_id": NumberInt(5),
  "role_id": NumberInt(4),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:38.0Z"),
  "created": ISODate("2016-03-12T09:48:38.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e5f65f66fba81100022f"),
  "auto_id": NumberInt(5),
  "user_id": NumberInt(6),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:38.0Z"),
  "created": ISODate("2016-03-12T09:48:38.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e5f65f66fba81100023a"),
  "auto_id": NumberInt(6),
  "user_id": NumberInt(7),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:38.0Z"),
  "created": ISODate("2016-03-12T09:48:38.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e5f65f66fba811000245"),
  "auto_id": NumberInt(7),
  "user_id": NumberInt(8),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:38.0Z"),
  "created": ISODate("2016-03-12T09:48:38.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e5f65f66fba811000250"),
  "auto_id": NumberInt(8),
  "user_id": NumberInt(9),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:38.0Z"),
  "created": ISODate("2016-03-12T09:48:38.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e5f65f66fba81100025b"),
  "auto_id": NumberInt(9),
  "user_id": NumberInt(10),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:38.0Z"),
  "created": ISODate("2016-03-12T09:48:38.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e5f65f66fba811000266"),
  "auto_id": NumberInt(10),
  "user_id": NumberInt(11),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:38.0Z"),
  "created": ISODate("2016-03-12T09:48:38.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e5f65f66fba811000271"),
  "auto_id": NumberInt(11),
  "user_id": NumberInt(12),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:38.0Z"),
  "created": ISODate("2016-03-12T09:48:38.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e5f65f66fba81100027c"),
  "auto_id": NumberInt(12),
  "user_id": NumberInt(13),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:38.0Z"),
  "created": ISODate("2016-03-12T09:48:38.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e5f65f66fba811000287"),
  "auto_id": NumberInt(13),
  "user_id": NumberInt(14),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:38.0Z"),
  "created": ISODate("2016-03-12T09:48:38.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e5f65f66fba811000292"),
  "auto_id": NumberInt(14),
  "user_id": NumberInt(15),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:38.0Z"),
  "created": ISODate("2016-03-12T09:48:38.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e5f75f66fba81100029d"),
  "auto_id": NumberInt(15),
  "user_id": NumberInt(16),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:39.0Z"),
  "created": ISODate("2016-03-12T09:48:39.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e5f75f66fba8110002a8"),
  "auto_id": NumberInt(16),
  "user_id": NumberInt(17),
  "role_id": NumberInt(4),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:39.0Z"),
  "created": ISODate("2016-03-12T09:48:39.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e5f75f66fba8110002b2"),
  "auto_id": NumberInt(17),
  "user_id": NumberInt(18),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:39.0Z"),
  "created": ISODate("2016-03-12T09:48:39.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e5f75f66fba8110002bd"),
  "auto_id": NumberInt(18),
  "user_id": NumberInt(19),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:39.0Z"),
  "created": ISODate("2016-03-12T09:48:39.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e5f75f66fba8110002c8"),
  "auto_id": NumberInt(19),
  "user_id": NumberInt(20),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:39.0Z"),
  "created": ISODate("2016-03-12T09:48:39.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e5f75f66fba8110002d3"),
  "auto_id": NumberInt(20),
  "user_id": NumberInt(21),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:39.0Z"),
  "created": ISODate("2016-03-12T09:48:39.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e5f75f66fba8110002de"),
  "auto_id": NumberInt(21),
  "user_id": NumberInt(22),
  "role_id": NumberInt(4),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:39.0Z"),
  "created": ISODate("2016-03-12T09:48:39.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e5f75f66fba8110002e8"),
  "auto_id": NumberInt(22),
  "user_id": NumberInt(23),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:39.0Z"),
  "created": ISODate("2016-03-12T09:48:39.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e5f75f66fba8110002f3"),
  "auto_id": NumberInt(23),
  "user_id": NumberInt(24),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:39.0Z"),
  "created": ISODate("2016-03-12T09:48:39.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e5f75f66fba8110002fe"),
  "auto_id": NumberInt(24),
  "user_id": NumberInt(25),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:39.0Z"),
  "created": ISODate("2016-03-12T09:48:39.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e5f75f66fba811000309"),
  "auto_id": NumberInt(25),
  "user_id": NumberInt(26),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:39.0Z"),
  "created": ISODate("2016-03-12T09:48:39.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e5f75f66fba811000314"),
  "auto_id": NumberInt(26),
  "user_id": NumberInt(27),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:39.0Z"),
  "created": ISODate("2016-03-12T09:48:39.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e5f75f66fba81100031f"),
  "auto_id": NumberInt(27),
  "user_id": NumberInt(28),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:39.0Z"),
  "created": ISODate("2016-03-12T09:48:39.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e5f75f66fba81100032a"),
  "auto_id": NumberInt(28),
  "user_id": NumberInt(29),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:39.0Z"),
  "created": ISODate("2016-03-12T09:48:39.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e5f75f66fba811000335"),
  "auto_id": NumberInt(29),
  "user_id": NumberInt(30),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:39.0Z"),
  "created": ISODate("2016-03-12T09:48:39.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e5f75f66fba811000340"),
  "auto_id": NumberInt(30),
  "user_id": NumberInt(31),
  "role_id": NumberInt(4),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:39.0Z"),
  "created": ISODate("2016-03-12T09:48:39.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e5f75f66fba81100034a"),
  "auto_id": NumberInt(31),
  "user_id": NumberInt(32),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:39.0Z"),
  "created": ISODate("2016-03-12T09:48:39.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e5f75f66fba811000355"),
  "auto_id": NumberInt(32),
  "user_id": NumberInt(33),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:39.0Z"),
  "created": ISODate("2016-03-12T09:48:39.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e5f85f66fba811000360"),
  "auto_id": NumberInt(33),
  "user_id": NumberInt(34),
  "role_id": NumberInt(4),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:40.0Z"),
  "created": ISODate("2016-03-12T09:48:40.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e5f85f66fba81100036a"),
  "auto_id": NumberInt(34),
  "user_id": NumberInt(35),
  "role_id": NumberInt(4),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:40.0Z"),
  "created": ISODate("2016-03-12T09:48:40.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e5f85f66fba811000374"),
  "auto_id": NumberInt(35),
  "user_id": NumberInt(36),
  "role_id": NumberInt(4),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:40.0Z"),
  "created": ISODate("2016-03-12T09:48:40.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e5f85f66fba81100037e"),
  "auto_id": NumberInt(36),
  "user_id": NumberInt(37),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:40.0Z"),
  "created": ISODate("2016-03-12T09:48:40.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e5f85f66fba811000389"),
  "auto_id": NumberInt(37),
  "user_id": NumberInt(38),
  "role_id": NumberInt(4),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:40.0Z"),
  "created": ISODate("2016-03-12T09:48:40.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e5f95f66fba811000393"),
  "auto_id": NumberInt(38),
  "user_id": NumberInt(39),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:41.0Z"),
  "created": ISODate("2016-03-12T09:48:41.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e5f95f66fba81100039e"),
  "auto_id": NumberInt(39),
  "user_id": NumberInt(40),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:41.0Z"),
  "created": ISODate("2016-03-12T09:48:41.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e5f95f66fba8110003a9"),
  "auto_id": NumberInt(40),
  "user_id": NumberInt(41),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:41.0Z"),
  "created": ISODate("2016-03-12T09:48:41.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e5f95f66fba8110003b4"),
  "auto_id": NumberInt(41),
  "user_id": NumberInt(42),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:41.0Z"),
  "created": ISODate("2016-03-12T09:48:41.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e5f95f66fba8110003bf"),
  "auto_id": NumberInt(42),
  "user_id": NumberInt(43),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:41.0Z"),
  "created": ISODate("2016-03-12T09:48:41.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e5f95f66fba8110003ca"),
  "auto_id": NumberInt(43),
  "user_id": NumberInt(44),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:41.0Z"),
  "created": ISODate("2016-03-12T09:48:41.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e5f95f66fba8110003d5"),
  "auto_id": NumberInt(44),
  "user_id": NumberInt(45),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:41.0Z"),
  "created": ISODate("2016-03-12T09:48:41.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e5f95f66fba8110003e0"),
  "auto_id": NumberInt(45),
  "user_id": NumberInt(46),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:41.0Z"),
  "created": ISODate("2016-03-12T09:48:41.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e5f95f66fba8110003eb"),
  "auto_id": NumberInt(46),
  "user_id": NumberInt(47),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:41.0Z"),
  "created": ISODate("2016-03-12T09:48:41.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e5f95f66fba8110003f6"),
  "auto_id": NumberInt(47),
  "user_id": NumberInt(48),
  "role_id": NumberInt(4),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:41.0Z"),
  "created": ISODate("2016-03-12T09:48:41.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e5f95f66fba811000400"),
  "auto_id": NumberInt(48),
  "user_id": NumberInt(49),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:41.0Z"),
  "created": ISODate("2016-03-12T09:48:41.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e5f95f66fba81100040b"),
  "auto_id": NumberInt(49),
  "user_id": NumberInt(50),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:41.0Z"),
  "created": ISODate("2016-03-12T09:48:41.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e5fa5f66fba811000416"),
  "auto_id": NumberInt(50),
  "user_id": NumberInt(51),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:42.0Z"),
  "created": ISODate("2016-03-12T09:48:42.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e5fa5f66fba811000421"),
  "auto_id": NumberInt(51),
  "user_id": NumberInt(52),
  "role_id": NumberInt(4),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:42.0Z"),
  "created": ISODate("2016-03-12T09:48:42.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e5fa5f66fba81100042b"),
  "auto_id": NumberInt(52),
  "user_id": NumberInt(53),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:42.0Z"),
  "created": ISODate("2016-03-12T09:48:42.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e5fa5f66fba811000436"),
  "auto_id": NumberInt(53),
  "user_id": NumberInt(54),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:42.0Z"),
  "created": ISODate("2016-03-12T09:48:42.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e5fa5f66fba811000441"),
  "auto_id": NumberInt(54),
  "user_id": NumberInt(55),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:42.0Z"),
  "created": ISODate("2016-03-12T09:48:42.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e5fa5f66fba81100044c"),
  "auto_id": NumberInt(55),
  "user_id": NumberInt(56),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:42.0Z"),
  "created": ISODate("2016-03-12T09:48:42.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e5fa5f66fba811000457"),
  "auto_id": NumberInt(56),
  "user_id": NumberInt(57),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:42.0Z"),
  "created": ISODate("2016-03-12T09:48:42.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e5fa5f66fba811000462"),
  "auto_id": NumberInt(57),
  "user_id": NumberInt(58),
  "role_id": NumberInt(4),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:42.0Z"),
  "created": ISODate("2016-03-12T09:48:42.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e5fa5f66fba81100046c"),
  "auto_id": NumberInt(58),
  "user_id": NumberInt(59),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:42.0Z"),
  "created": ISODate("2016-03-12T09:48:42.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e5fa5f66fba811000477"),
  "auto_id": NumberInt(59),
  "user_id": NumberInt(60),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:42.0Z"),
  "created": ISODate("2016-03-12T09:48:42.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e6ae1f5f66fb9c0f000005"),
  "auto_id": NumberInt(449),
  "user_id": NumberInt(449),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-14T12:27:11.0Z"),
  "created": ISODate("2016-03-14T12:27:11.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79855f66fb2415000268"),
  "auto_id": NumberInt(457),
  "user_id": NumberInt(3),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:31:49.0Z"),
  "created": ISODate("2016-03-17T09:31:49.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e5fa5f66fba811000482"),
  "auto_id": NumberInt(60),
  "user_id": NumberInt(61),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:42.0Z"),
  "created": ISODate("2016-03-12T09:48:42.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e5fa5f66fba81100048d"),
  "auto_id": NumberInt(61),
  "user_id": NumberInt(62),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:42.0Z"),
  "created": ISODate("2016-03-12T09:48:42.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e5fa5f66fba811000498"),
  "auto_id": NumberInt(62),
  "user_id": NumberInt(63),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:42.0Z"),
  "created": ISODate("2016-03-12T09:48:42.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e5fb5f66fba8110004a3"),
  "auto_id": NumberInt(63),
  "user_id": NumberInt(64),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:43.0Z"),
  "created": ISODate("2016-03-12T09:48:43.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e5fb5f66fba8110004ae"),
  "auto_id": NumberInt(64),
  "user_id": NumberInt(65),
  "role_id": NumberInt(4),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:43.0Z"),
  "created": ISODate("2016-03-12T09:48:43.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e5fb5f66fba8110004b8"),
  "auto_id": NumberInt(65),
  "user_id": NumberInt(66),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:43.0Z"),
  "created": ISODate("2016-03-12T09:48:43.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e5fb5f66fba8110004c3"),
  "auto_id": NumberInt(66),
  "user_id": NumberInt(67),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:43.0Z"),
  "created": ISODate("2016-03-12T09:48:43.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e5fb5f66fba8110004ce"),
  "auto_id": NumberInt(67),
  "user_id": NumberInt(68),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:43.0Z"),
  "created": ISODate("2016-03-12T09:48:43.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e5fb5f66fba8110004d9"),
  "auto_id": NumberInt(68),
  "user_id": NumberInt(69),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:43.0Z"),
  "created": ISODate("2016-03-12T09:48:43.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e5fb5f66fba8110004e4"),
  "auto_id": NumberInt(69),
  "user_id": NumberInt(70),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:43.0Z"),
  "created": ISODate("2016-03-12T09:48:43.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e5fb5f66fba8110004ef"),
  "auto_id": NumberInt(70),
  "user_id": NumberInt(71),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:43.0Z"),
  "created": ISODate("2016-03-12T09:48:43.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e5fb5f66fba8110004fa"),
  "auto_id": NumberInt(71),
  "user_id": NumberInt(72),
  "role_id": NumberInt(4),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:43.0Z"),
  "created": ISODate("2016-03-12T09:48:43.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e5fb5f66fba811000504"),
  "auto_id": NumberInt(72),
  "user_id": NumberInt(73),
  "role_id": NumberInt(4),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:43.0Z"),
  "created": ISODate("2016-03-12T09:48:43.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e5fc5f66fba81100050e"),
  "auto_id": NumberInt(73),
  "user_id": NumberInt(74),
  "role_id": NumberInt(4),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:44.0Z"),
  "created": ISODate("2016-03-12T09:48:44.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e5fc5f66fba811000518"),
  "auto_id": NumberInt(74),
  "user_id": NumberInt(75),
  "role_id": NumberInt(4),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:44.0Z"),
  "created": ISODate("2016-03-12T09:48:44.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e5fc5f66fba811000522"),
  "auto_id": NumberInt(75),
  "user_id": NumberInt(76),
  "role_id": NumberInt(4),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:44.0Z"),
  "created": ISODate("2016-03-12T09:48:44.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e5fc5f66fba81100052c"),
  "auto_id": NumberInt(76),
  "user_id": NumberInt(77),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:44.0Z"),
  "created": ISODate("2016-03-12T09:48:44.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e5fc5f66fba811000537"),
  "auto_id": NumberInt(77),
  "user_id": NumberInt(78),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:44.0Z"),
  "created": ISODate("2016-03-12T09:48:44.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e5fc5f66fba811000542"),
  "auto_id": NumberInt(78),
  "user_id": NumberInt(79),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:44.0Z"),
  "created": ISODate("2016-03-12T09:48:44.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e5fc5f66fba81100054d"),
  "auto_id": NumberInt(79),
  "user_id": NumberInt(80),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:44.0Z"),
  "created": ISODate("2016-03-12T09:48:44.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e5fc5f66fba811000558"),
  "auto_id": NumberInt(80),
  "user_id": NumberInt(81),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:44.0Z"),
  "created": ISODate("2016-03-12T09:48:44.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e5fc5f66fba811000563"),
  "auto_id": NumberInt(81),
  "user_id": NumberInt(82),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:44.0Z"),
  "created": ISODate("2016-03-12T09:48:44.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e5fc5f66fba81100056e"),
  "auto_id": NumberInt(82),
  "user_id": NumberInt(83),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:44.0Z"),
  "created": ISODate("2016-03-12T09:48:44.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e5fc5f66fba811000579"),
  "auto_id": NumberInt(83),
  "user_id": NumberInt(84),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:44.0Z"),
  "created": ISODate("2016-03-12T09:48:44.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e5fc5f66fba811000584"),
  "auto_id": NumberInt(84),
  "user_id": NumberInt(85),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:44.0Z"),
  "created": ISODate("2016-03-12T09:48:44.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e5fd5f66fba81100058f"),
  "auto_id": NumberInt(85),
  "user_id": NumberInt(86),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:45.0Z"),
  "created": ISODate("2016-03-12T09:48:45.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e5fd5f66fba81100059a"),
  "auto_id": NumberInt(86),
  "user_id": NumberInt(87),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:45.0Z"),
  "created": ISODate("2016-03-12T09:48:45.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e5fd5f66fba8110005a5"),
  "auto_id": NumberInt(87),
  "user_id": NumberInt(88),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:45.0Z"),
  "created": ISODate("2016-03-12T09:48:45.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e5fd5f66fba8110005b0"),
  "auto_id": NumberInt(88),
  "user_id": NumberInt(89),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:45.0Z"),
  "created": ISODate("2016-03-12T09:48:45.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e5fd5f66fba8110005bb"),
  "auto_id": NumberInt(89),
  "user_id": NumberInt(90),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:45.0Z"),
  "created": ISODate("2016-03-12T09:48:45.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e5fd5f66fba8110005c6"),
  "auto_id": NumberInt(90),
  "user_id": NumberInt(91),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:45.0Z"),
  "created": ISODate("2016-03-12T09:48:45.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e5fd5f66fba8110005d1"),
  "auto_id": NumberInt(91),
  "user_id": NumberInt(92),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:45.0Z"),
  "created": ISODate("2016-03-12T09:48:45.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e5fd5f66fba8110005dc"),
  "auto_id": NumberInt(92),
  "user_id": NumberInt(93),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:45.0Z"),
  "created": ISODate("2016-03-12T09:48:45.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e5fd5f66fba8110005e7"),
  "auto_id": NumberInt(93),
  "user_id": NumberInt(94),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:45.0Z"),
  "created": ISODate("2016-03-12T09:48:45.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e5fd5f66fba8110005f2"),
  "auto_id": NumberInt(94),
  "user_id": NumberInt(95),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:45.0Z"),
  "created": ISODate("2016-03-12T09:48:45.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e5fd5f66fba8110005fd"),
  "auto_id": NumberInt(95),
  "user_id": NumberInt(96),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:45.0Z"),
  "created": ISODate("2016-03-12T09:48:45.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e5fd5f66fba811000608"),
  "auto_id": NumberInt(96),
  "user_id": NumberInt(97),
  "role_id": NumberInt(4),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:45.0Z"),
  "created": ISODate("2016-03-12T09:48:45.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e5fe5f66fba811000612"),
  "auto_id": NumberInt(97),
  "user_id": NumberInt(98),
  "role_id": NumberInt(4),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:46.0Z"),
  "created": ISODate("2016-03-12T09:48:46.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e5fe5f66fba81100061c"),
  "auto_id": NumberInt(98),
  "user_id": NumberInt(99),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:46.0Z"),
  "created": ISODate("2016-03-12T09:48:46.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e5fe5f66fba811000627"),
  "auto_id": NumberInt(99),
  "user_id": NumberInt(100),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:46.0Z"),
  "created": ISODate("2016-03-12T09:48:46.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e5fe5f66fba811000632"),
  "auto_id": NumberInt(100),
  "user_id": NumberInt(101),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:46.0Z"),
  "created": ISODate("2016-03-12T09:48:46.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e5fe5f66fba81100063d"),
  "auto_id": NumberInt(101),
  "user_id": NumberInt(102),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:46.0Z"),
  "created": ISODate("2016-03-12T09:48:46.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e5fe5f66fba811000648"),
  "auto_id": NumberInt(102),
  "user_id": NumberInt(103),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:46.0Z"),
  "created": ISODate("2016-03-12T09:48:46.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e5fe5f66fba811000653"),
  "auto_id": NumberInt(103),
  "user_id": NumberInt(104),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:46.0Z"),
  "created": ISODate("2016-03-12T09:48:46.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e5fe5f66fba81100065e"),
  "auto_id": NumberInt(104),
  "user_id": NumberInt(105),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:46.0Z"),
  "created": ISODate("2016-03-12T09:48:46.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e5ff5f66fba811000669"),
  "auto_id": NumberInt(105),
  "user_id": NumberInt(106),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:47.0Z"),
  "created": ISODate("2016-03-12T09:48:47.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e5ff5f66fba811000674"),
  "auto_id": NumberInt(106),
  "user_id": NumberInt(107),
  "role_id": NumberInt(4),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:47.0Z"),
  "created": ISODate("2016-03-12T09:48:47.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e5ff5f66fba81100067e"),
  "auto_id": NumberInt(107),
  "user_id": NumberInt(108),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:47.0Z"),
  "created": ISODate("2016-03-12T09:48:47.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e5ff5f66fba811000689"),
  "auto_id": NumberInt(108),
  "user_id": NumberInt(109),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:47.0Z"),
  "created": ISODate("2016-03-12T09:48:47.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e5ff5f66fba811000694"),
  "auto_id": NumberInt(109),
  "user_id": NumberInt(110),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:47.0Z"),
  "created": ISODate("2016-03-12T09:48:47.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e5ff5f66fba81100069f"),
  "auto_id": NumberInt(110),
  "user_id": NumberInt(111),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:47.0Z"),
  "created": ISODate("2016-03-12T09:48:47.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e5ff5f66fba8110006aa"),
  "auto_id": NumberInt(111),
  "user_id": NumberInt(112),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:47.0Z"),
  "created": ISODate("2016-03-12T09:48:47.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e5ff5f66fba8110006b5"),
  "auto_id": NumberInt(112),
  "user_id": NumberInt(113),
  "role_id": NumberInt(4),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:47.0Z"),
  "created": ISODate("2016-03-12T09:48:47.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e5ff5f66fba8110006bf"),
  "auto_id": NumberInt(113),
  "user_id": NumberInt(114),
  "role_id": NumberInt(4),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:47.0Z"),
  "created": ISODate("2016-03-12T09:48:47.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e6005f66fba8110006c9"),
  "auto_id": NumberInt(114),
  "user_id": NumberInt(115),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:48.0Z"),
  "created": ISODate("2016-03-12T09:48:48.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e6005f66fba8110006d4"),
  "auto_id": NumberInt(115),
  "user_id": NumberInt(116),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:48.0Z"),
  "created": ISODate("2016-03-12T09:48:48.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e6005f66fba8110006df"),
  "auto_id": NumberInt(116),
  "user_id": NumberInt(117),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:48.0Z"),
  "created": ISODate("2016-03-12T09:48:48.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e6005f66fba8110006ea"),
  "auto_id": NumberInt(117),
  "user_id": NumberInt(118),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:48.0Z"),
  "created": ISODate("2016-03-12T09:48:48.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e6005f66fba8110006f5"),
  "auto_id": NumberInt(118),
  "user_id": NumberInt(119),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:48.0Z"),
  "created": ISODate("2016-03-12T09:48:48.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e6005f66fba811000700"),
  "auto_id": NumberInt(119),
  "user_id": NumberInt(120),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:48.0Z"),
  "created": ISODate("2016-03-12T09:48:48.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e6005f66fba81100070b"),
  "auto_id": NumberInt(120),
  "user_id": NumberInt(121),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:48.0Z"),
  "created": ISODate("2016-03-12T09:48:48.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e6005f66fba811000716"),
  "auto_id": NumberInt(121),
  "user_id": NumberInt(122),
  "role_id": NumberInt(4),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:48.0Z"),
  "created": ISODate("2016-03-12T09:48:48.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e6005f66fba811000720"),
  "auto_id": NumberInt(122),
  "user_id": NumberInt(123),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:48.0Z"),
  "created": ISODate("2016-03-12T09:48:48.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e6005f66fba81100072b"),
  "auto_id": NumberInt(123),
  "user_id": NumberInt(124),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:48.0Z"),
  "created": ISODate("2016-03-12T09:48:48.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e6005f66fba811000736"),
  "auto_id": NumberInt(124),
  "user_id": NumberInt(125),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:48.0Z"),
  "created": ISODate("2016-03-12T09:48:48.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e6015f66fba811000741"),
  "auto_id": NumberInt(125),
  "user_id": NumberInt(126),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:49.0Z"),
  "created": ISODate("2016-03-12T09:48:49.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e6015f66fba81100074c"),
  "auto_id": NumberInt(126),
  "user_id": NumberInt(127),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:49.0Z"),
  "created": ISODate("2016-03-12T09:48:49.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e6015f66fba811000757"),
  "auto_id": NumberInt(127),
  "user_id": NumberInt(128),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:49.0Z"),
  "created": ISODate("2016-03-12T09:48:49.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e6015f66fba811000762"),
  "auto_id": NumberInt(128),
  "user_id": NumberInt(129),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:49.0Z"),
  "created": ISODate("2016-03-12T09:48:49.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e6015f66fba81100076d"),
  "auto_id": NumberInt(129),
  "user_id": NumberInt(130),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:49.0Z"),
  "created": ISODate("2016-03-12T09:48:49.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e6015f66fba811000778"),
  "auto_id": NumberInt(130),
  "user_id": NumberInt(131),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:49.0Z"),
  "created": ISODate("2016-03-12T09:48:49.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e6015f66fba811000783"),
  "auto_id": NumberInt(131),
  "user_id": NumberInt(132),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:49.0Z"),
  "created": ISODate("2016-03-12T09:48:49.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e6015f66fba81100078e"),
  "auto_id": NumberInt(132),
  "user_id": NumberInt(133),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:49.0Z"),
  "created": ISODate("2016-03-12T09:48:49.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e6025f66fba811000799"),
  "auto_id": NumberInt(133),
  "user_id": NumberInt(134),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:50.0Z"),
  "created": ISODate("2016-03-12T09:48:50.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e6025f66fba8110007a4"),
  "auto_id": NumberInt(134),
  "user_id": NumberInt(135),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:50.0Z"),
  "created": ISODate("2016-03-12T09:48:50.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e6025f66fba8110007af"),
  "auto_id": NumberInt(135),
  "user_id": NumberInt(136),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:50.0Z"),
  "created": ISODate("2016-03-12T09:48:50.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e6025f66fba8110007ba"),
  "auto_id": NumberInt(136),
  "user_id": NumberInt(137),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:50.0Z"),
  "created": ISODate("2016-03-12T09:48:50.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e6025f66fba8110007c5"),
  "auto_id": NumberInt(137),
  "user_id": NumberInt(138),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:50.0Z"),
  "created": ISODate("2016-03-12T09:48:50.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e6025f66fba8110007d0"),
  "auto_id": NumberInt(138),
  "user_id": NumberInt(139),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:50.0Z"),
  "created": ISODate("2016-03-12T09:48:50.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e6025f66fba8110007db"),
  "auto_id": NumberInt(139),
  "user_id": NumberInt(140),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:50.0Z"),
  "created": ISODate("2016-03-12T09:48:50.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e6025f66fba8110007e6"),
  "auto_id": NumberInt(140),
  "user_id": NumberInt(141),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:50.0Z"),
  "created": ISODate("2016-03-12T09:48:50.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e6025f66fba8110007f1"),
  "auto_id": NumberInt(141),
  "user_id": NumberInt(142),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:50.0Z"),
  "created": ISODate("2016-03-12T09:48:50.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e6025f66fba8110007fc"),
  "auto_id": NumberInt(142),
  "user_id": NumberInt(143),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:50.0Z"),
  "created": ISODate("2016-03-12T09:48:50.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e6025f66fba811000807"),
  "auto_id": NumberInt(143),
  "user_id": NumberInt(144),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:50.0Z"),
  "created": ISODate("2016-03-12T09:48:50.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e6035f66fba811000812"),
  "auto_id": NumberInt(144),
  "user_id": NumberInt(145),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:51.0Z"),
  "created": ISODate("2016-03-12T09:48:51.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e6035f66fba81100081d"),
  "auto_id": NumberInt(145),
  "user_id": NumberInt(146),
  "role_id": NumberInt(4),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:51.0Z"),
  "created": ISODate("2016-03-12T09:48:51.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e6035f66fba811000827"),
  "auto_id": NumberInt(146),
  "user_id": NumberInt(147),
  "role_id": NumberInt(4),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:51.0Z"),
  "created": ISODate("2016-03-12T09:48:51.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e6035f66fba811000831"),
  "auto_id": NumberInt(147),
  "user_id": NumberInt(148),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:51.0Z"),
  "created": ISODate("2016-03-12T09:48:51.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e6035f66fba81100083c"),
  "auto_id": NumberInt(148),
  "user_id": NumberInt(149),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:51.0Z"),
  "created": ISODate("2016-03-12T09:48:51.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e6035f66fba811000847"),
  "auto_id": NumberInt(149),
  "user_id": NumberInt(150),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:51.0Z"),
  "created": ISODate("2016-03-12T09:48:51.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e6035f66fba811000852"),
  "auto_id": NumberInt(150),
  "user_id": NumberInt(151),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:51.0Z"),
  "created": ISODate("2016-03-12T09:48:51.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e6035f66fba81100085d"),
  "auto_id": NumberInt(151),
  "user_id": NumberInt(152),
  "role_id": NumberInt(4),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:51.0Z"),
  "created": ISODate("2016-03-12T09:48:51.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e6035f66fba811000867"),
  "auto_id": NumberInt(152),
  "user_id": NumberInt(153),
  "role_id": NumberInt(4),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:51.0Z"),
  "created": ISODate("2016-03-12T09:48:51.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e6035f66fba811000871"),
  "auto_id": NumberInt(153),
  "user_id": NumberInt(154),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:51.0Z"),
  "created": ISODate("2016-03-12T09:48:51.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e6035f66fba81100087c"),
  "auto_id": NumberInt(154),
  "user_id": NumberInt(155),
  "role_id": NumberInt(4),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:51.0Z"),
  "created": ISODate("2016-03-12T09:48:51.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e6045f66fba811000886"),
  "auto_id": NumberInt(155),
  "user_id": NumberInt(156),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:52.0Z"),
  "created": ISODate("2016-03-12T09:48:52.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e6045f66fba811000891"),
  "auto_id": NumberInt(156),
  "user_id": NumberInt(157),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:52.0Z"),
  "created": ISODate("2016-03-12T09:48:52.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e6045f66fba81100089c"),
  "auto_id": NumberInt(157),
  "user_id": NumberInt(158),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:52.0Z"),
  "created": ISODate("2016-03-12T09:48:52.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e6045f66fba8110008a7"),
  "auto_id": NumberInt(158),
  "user_id": NumberInt(159),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:52.0Z"),
  "created": ISODate("2016-03-12T09:48:52.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e6045f66fba8110008b2"),
  "auto_id": NumberInt(159),
  "user_id": NumberInt(160),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:52.0Z"),
  "created": ISODate("2016-03-12T09:48:52.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e6045f66fba8110008bd"),
  "auto_id": NumberInt(160),
  "user_id": NumberInt(161),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:52.0Z"),
  "created": ISODate("2016-03-12T09:48:52.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e6045f66fba8110008c8"),
  "auto_id": NumberInt(161),
  "user_id": NumberInt(162),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:52.0Z"),
  "created": ISODate("2016-03-12T09:48:52.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e6045f66fba8110008d3"),
  "auto_id": NumberInt(162),
  "user_id": NumberInt(163),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:52.0Z"),
  "created": ISODate("2016-03-12T09:48:52.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e6045f66fba8110008de"),
  "auto_id": NumberInt(163),
  "user_id": NumberInt(164),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:52.0Z"),
  "created": ISODate("2016-03-12T09:48:52.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e6045f66fba8110008e9"),
  "auto_id": NumberInt(164),
  "user_id": NumberInt(165),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:52.0Z"),
  "created": ISODate("2016-03-12T09:48:52.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e6055f66fba8110008f4"),
  "auto_id": NumberInt(165),
  "user_id": NumberInt(166),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:53.0Z"),
  "created": ISODate("2016-03-12T09:48:53.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e6055f66fba8110008ff"),
  "auto_id": NumberInt(166),
  "user_id": NumberInt(167),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:53.0Z"),
  "created": ISODate("2016-03-12T09:48:53.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e6055f66fba81100090a"),
  "auto_id": NumberInt(167),
  "user_id": NumberInt(168),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:53.0Z"),
  "created": ISODate("2016-03-12T09:48:53.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e6055f66fba811000915"),
  "auto_id": NumberInt(168),
  "user_id": NumberInt(169),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:53.0Z"),
  "created": ISODate("2016-03-12T09:48:53.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e6055f66fba811000920"),
  "auto_id": NumberInt(169),
  "user_id": NumberInt(170),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:53.0Z"),
  "created": ISODate("2016-03-12T09:48:53.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e6055f66fba81100092b"),
  "auto_id": NumberInt(170),
  "user_id": NumberInt(171),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:53.0Z"),
  "created": ISODate("2016-03-12T09:48:53.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e6055f66fba811000936"),
  "auto_id": NumberInt(171),
  "user_id": NumberInt(172),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:53.0Z"),
  "created": ISODate("2016-03-12T09:48:53.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e6055f66fba811000941"),
  "auto_id": NumberInt(172),
  "user_id": NumberInt(173),
  "role_id": NumberInt(4),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:53.0Z"),
  "created": ISODate("2016-03-12T09:48:53.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e6065f66fba81100094b"),
  "auto_id": NumberInt(173),
  "user_id": NumberInt(174),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:54.0Z"),
  "created": ISODate("2016-03-12T09:48:54.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e6065f66fba811000956"),
  "auto_id": NumberInt(174),
  "user_id": NumberInt(175),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:54.0Z"),
  "created": ISODate("2016-03-12T09:48:54.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e6065f66fba811000961"),
  "auto_id": NumberInt(175),
  "user_id": NumberInt(176),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:54.0Z"),
  "created": ISODate("2016-03-12T09:48:54.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e6065f66fba81100096c"),
  "auto_id": NumberInt(176),
  "user_id": NumberInt(177),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:54.0Z"),
  "created": ISODate("2016-03-12T09:48:54.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e6065f66fba811000977"),
  "auto_id": NumberInt(177),
  "user_id": NumberInt(178),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:54.0Z"),
  "created": ISODate("2016-03-12T09:48:54.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e6075f66fba811000982"),
  "auto_id": NumberInt(178),
  "user_id": NumberInt(179),
  "role_id": NumberInt(4),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:55.0Z"),
  "created": ISODate("2016-03-12T09:48:55.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e6075f66fba81100098c"),
  "auto_id": NumberInt(179),
  "user_id": NumberInt(180),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:55.0Z"),
  "created": ISODate("2016-03-12T09:48:55.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e6075f66fba811000997"),
  "auto_id": NumberInt(180),
  "user_id": NumberInt(181),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:55.0Z"),
  "created": ISODate("2016-03-12T09:48:55.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e6075f66fba8110009a2"),
  "auto_id": NumberInt(181),
  "user_id": NumberInt(182),
  "role_id": NumberInt(4),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:55.0Z"),
  "created": ISODate("2016-03-12T09:48:55.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e6075f66fba8110009ac"),
  "auto_id": NumberInt(182),
  "user_id": NumberInt(183),
  "role_id": NumberInt(4),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:55.0Z"),
  "created": ISODate("2016-03-12T09:48:55.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e6085f66fba8110009b6"),
  "auto_id": NumberInt(183),
  "user_id": NumberInt(184),
  "role_id": NumberInt(4),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:56.0Z"),
  "created": ISODate("2016-03-12T09:48:56.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e6085f66fba8110009c0"),
  "auto_id": NumberInt(184),
  "user_id": NumberInt(185),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:56.0Z"),
  "created": ISODate("2016-03-12T09:48:56.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e6085f66fba8110009cb"),
  "auto_id": NumberInt(185),
  "user_id": NumberInt(186),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:56.0Z"),
  "created": ISODate("2016-03-12T09:48:56.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e6085f66fba8110009d6"),
  "auto_id": NumberInt(186),
  "user_id": NumberInt(187),
  "role_id": NumberInt(4),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:56.0Z"),
  "created": ISODate("2016-03-12T09:48:56.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e6085f66fba8110009e0"),
  "auto_id": NumberInt(187),
  "user_id": NumberInt(188),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:56.0Z"),
  "created": ISODate("2016-03-12T09:48:56.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e6085f66fba8110009eb"),
  "auto_id": NumberInt(188),
  "user_id": NumberInt(189),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:56.0Z"),
  "created": ISODate("2016-03-12T09:48:56.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e6085f66fba8110009f6"),
  "auto_id": NumberInt(189),
  "user_id": NumberInt(190),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:56.0Z"),
  "created": ISODate("2016-03-12T09:48:56.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e6085f66fba811000a01"),
  "auto_id": NumberInt(190),
  "user_id": NumberInt(191),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:56.0Z"),
  "created": ISODate("2016-03-12T09:48:56.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e6085f66fba811000a0c"),
  "auto_id": NumberInt(191),
  "user_id": NumberInt(192),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:56.0Z"),
  "created": ISODate("2016-03-12T09:48:56.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e6085f66fba811000a17"),
  "auto_id": NumberInt(192),
  "user_id": NumberInt(193),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:56.0Z"),
  "created": ISODate("2016-03-12T09:48:56.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e60a5f66fba811000a22"),
  "auto_id": NumberInt(193),
  "user_id": NumberInt(194),
  "role_id": NumberInt(4),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:58.0Z"),
  "created": ISODate("2016-03-12T09:48:58.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e60a5f66fba811000a2c"),
  "auto_id": NumberInt(194),
  "user_id": NumberInt(195),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:58.0Z"),
  "created": ISODate("2016-03-12T09:48:58.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e60a5f66fba811000a37"),
  "auto_id": NumberInt(195),
  "user_id": NumberInt(196),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:58.0Z"),
  "created": ISODate("2016-03-12T09:48:58.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e60a5f66fba811000a42"),
  "auto_id": NumberInt(196),
  "user_id": NumberInt(197),
  "role_id": NumberInt(4),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:58.0Z"),
  "created": ISODate("2016-03-12T09:48:58.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e60a5f66fba811000a4c"),
  "auto_id": NumberInt(197),
  "user_id": NumberInt(198),
  "role_id": NumberInt(4),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:58.0Z"),
  "created": ISODate("2016-03-12T09:48:58.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e60a5f66fba811000a56"),
  "auto_id": NumberInt(198),
  "user_id": NumberInt(199),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:58.0Z"),
  "created": ISODate("2016-03-12T09:48:58.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e60a5f66fba811000a61"),
  "auto_id": NumberInt(199),
  "user_id": NumberInt(200),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:58.0Z"),
  "created": ISODate("2016-03-12T09:48:58.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e60a5f66fba811000a6c"),
  "auto_id": NumberInt(200),
  "user_id": NumberInt(201),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:58.0Z"),
  "created": ISODate("2016-03-12T09:48:58.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e60a5f66fba811000a77"),
  "auto_id": NumberInt(201),
  "user_id": NumberInt(202),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:58.0Z"),
  "created": ISODate("2016-03-12T09:48:58.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e60a5f66fba811000a82"),
  "auto_id": NumberInt(202),
  "user_id": NumberInt(203),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:58.0Z"),
  "created": ISODate("2016-03-12T09:48:58.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e60b5f66fba811000a8d"),
  "auto_id": NumberInt(203),
  "user_id": NumberInt(204),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:59.0Z"),
  "created": ISODate("2016-03-12T09:48:59.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e60b5f66fba811000a98"),
  "auto_id": NumberInt(204),
  "user_id": NumberInt(205),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:59.0Z"),
  "created": ISODate("2016-03-12T09:48:59.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e60b5f66fba811000aa3"),
  "auto_id": NumberInt(205),
  "user_id": NumberInt(206),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:59.0Z"),
  "created": ISODate("2016-03-12T09:48:59.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e60b5f66fba811000aae"),
  "auto_id": NumberInt(206),
  "user_id": NumberInt(207),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:48:59.0Z"),
  "created": ISODate("2016-03-12T09:48:59.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e60c5f66fba811000ab9"),
  "auto_id": NumberInt(207),
  "user_id": NumberInt(208),
  "role_id": NumberInt(4),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:49:00.0Z"),
  "created": ISODate("2016-03-12T09:49:00.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e60c5f66fba811000ac3"),
  "auto_id": NumberInt(208),
  "user_id": NumberInt(209),
  "role_id": NumberInt(4),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:49:00.0Z"),
  "created": ISODate("2016-03-12T09:49:00.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e60c5f66fba811000acd"),
  "auto_id": NumberInt(209),
  "user_id": NumberInt(210),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:49:00.0Z"),
  "created": ISODate("2016-03-12T09:49:00.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e60c5f66fba811000ad8"),
  "auto_id": NumberInt(210),
  "user_id": NumberInt(211),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:49:00.0Z"),
  "created": ISODate("2016-03-12T09:49:00.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e60c5f66fba811000ae3"),
  "auto_id": NumberInt(211),
  "user_id": NumberInt(212),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:49:00.0Z"),
  "created": ISODate("2016-03-12T09:49:00.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e60c5f66fba811000aee"),
  "auto_id": NumberInt(212),
  "user_id": NumberInt(213),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:49:00.0Z"),
  "created": ISODate("2016-03-12T09:49:00.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e60c5f66fba811000af9"),
  "auto_id": NumberInt(213),
  "user_id": NumberInt(214),
  "role_id": NumberInt(4),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:49:00.0Z"),
  "created": ISODate("2016-03-12T09:49:00.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e60c5f66fba811000b03"),
  "auto_id": NumberInt(214),
  "user_id": NumberInt(215),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:49:00.0Z"),
  "created": ISODate("2016-03-12T09:49:00.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e60d5f66fba811000b0e"),
  "auto_id": NumberInt(215),
  "user_id": NumberInt(216),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:49:01.0Z"),
  "created": ISODate("2016-03-12T09:49:01.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e60d5f66fba811000b19"),
  "auto_id": NumberInt(216),
  "user_id": NumberInt(217),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:49:01.0Z"),
  "created": ISODate("2016-03-12T09:49:01.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e60d5f66fba811000b24"),
  "auto_id": NumberInt(217),
  "user_id": NumberInt(218),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:49:01.0Z"),
  "created": ISODate("2016-03-12T09:49:01.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e60d5f66fba811000b2f"),
  "auto_id": NumberInt(218),
  "user_id": NumberInt(219),
  "role_id": NumberInt(4),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:49:01.0Z"),
  "created": ISODate("2016-03-12T09:49:01.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e60d5f66fba811000b39"),
  "auto_id": NumberInt(219),
  "user_id": NumberInt(220),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:49:01.0Z"),
  "created": ISODate("2016-03-12T09:49:01.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e60d5f66fba811000b44"),
  "auto_id": NumberInt(220),
  "user_id": NumberInt(221),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:49:01.0Z"),
  "created": ISODate("2016-03-12T09:49:01.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e60d5f66fba811000b4f"),
  "auto_id": NumberInt(221),
  "user_id": NumberInt(222),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:49:01.0Z"),
  "created": ISODate("2016-03-12T09:49:01.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e60d5f66fba811000b5a"),
  "auto_id": NumberInt(222),
  "user_id": NumberInt(223),
  "role_id": NumberInt(4),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:49:01.0Z"),
  "created": ISODate("2016-03-12T09:49:01.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e60e5f66fba811000b64"),
  "auto_id": NumberInt(223),
  "user_id": NumberInt(224),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:49:02.0Z"),
  "created": ISODate("2016-03-12T09:49:02.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e60e5f66fba811000b6f"),
  "auto_id": NumberInt(224),
  "user_id": NumberInt(225),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:49:02.0Z"),
  "created": ISODate("2016-03-12T09:49:02.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e60e5f66fba811000b7a"),
  "auto_id": NumberInt(225),
  "user_id": NumberInt(226),
  "role_id": NumberInt(4),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:49:02.0Z"),
  "created": ISODate("2016-03-12T09:49:02.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e60e5f66fba811000b84"),
  "auto_id": NumberInt(226),
  "user_id": NumberInt(227),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:49:02.0Z"),
  "created": ISODate("2016-03-12T09:49:02.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e60e5f66fba811000b8f"),
  "auto_id": NumberInt(227),
  "user_id": NumberInt(228),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:49:02.0Z"),
  "created": ISODate("2016-03-12T09:49:02.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e60e5f66fba811000b9a"),
  "auto_id": NumberInt(228),
  "user_id": NumberInt(229),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:49:02.0Z"),
  "created": ISODate("2016-03-12T09:49:02.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e60e5f66fba811000ba5"),
  "auto_id": NumberInt(229),
  "user_id": NumberInt(230),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:49:02.0Z"),
  "created": ISODate("2016-03-12T09:49:02.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e60e5f66fba811000bb0"),
  "auto_id": NumberInt(230),
  "user_id": NumberInt(231),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:49:02.0Z"),
  "created": ISODate("2016-03-12T09:49:02.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e60e5f66fba811000bbb"),
  "auto_id": NumberInt(231),
  "user_id": NumberInt(232),
  "role_id": NumberInt(4),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:49:02.0Z"),
  "created": ISODate("2016-03-12T09:49:02.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e60e5f66fba811000bc5"),
  "auto_id": NumberInt(232),
  "user_id": NumberInt(233),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:49:02.0Z"),
  "created": ISODate("2016-03-12T09:49:02.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e60f5f66fba811000bd0"),
  "auto_id": NumberInt(233),
  "user_id": NumberInt(234),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:49:03.0Z"),
  "created": ISODate("2016-03-12T09:49:03.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e60f5f66fba811000bdb"),
  "auto_id": NumberInt(234),
  "user_id": NumberInt(235),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:49:03.0Z"),
  "created": ISODate("2016-03-12T09:49:03.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e60f5f66fba811000be6"),
  "auto_id": NumberInt(235),
  "user_id": NumberInt(236),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:49:03.0Z"),
  "created": ISODate("2016-03-12T09:49:03.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e60f5f66fba811000bf1"),
  "auto_id": NumberInt(236),
  "user_id": NumberInt(237),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:49:03.0Z"),
  "created": ISODate("2016-03-12T09:49:03.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e60f5f66fba811000bfc"),
  "auto_id": NumberInt(237),
  "user_id": NumberInt(238),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:49:03.0Z"),
  "created": ISODate("2016-03-12T09:49:03.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e60f5f66fba811000c07"),
  "auto_id": NumberInt(238),
  "user_id": NumberInt(239),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:49:03.0Z"),
  "created": ISODate("2016-03-12T09:49:03.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e60f5f66fba811000c12"),
  "auto_id": NumberInt(239),
  "user_id": NumberInt(240),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:49:03.0Z"),
  "created": ISODate("2016-03-12T09:49:03.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e60f5f66fba811000c1d"),
  "auto_id": NumberInt(240),
  "user_id": NumberInt(241),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:49:03.0Z"),
  "created": ISODate("2016-03-12T09:49:03.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e60f5f66fba811000c28"),
  "auto_id": NumberInt(241),
  "user_id": NumberInt(242),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:49:03.0Z"),
  "created": ISODate("2016-03-12T09:49:03.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e60f5f66fba811000c33"),
  "auto_id": NumberInt(242),
  "user_id": NumberInt(243),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:49:03.0Z"),
  "created": ISODate("2016-03-12T09:49:03.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e6105f66fba811000c3e"),
  "auto_id": NumberInt(243),
  "user_id": NumberInt(244),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:49:04.0Z"),
  "created": ISODate("2016-03-12T09:49:04.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e6105f66fba811000c49"),
  "auto_id": NumberInt(244),
  "user_id": NumberInt(245),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:49:04.0Z"),
  "created": ISODate("2016-03-12T09:49:04.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e3e6105f66fba811000c54"),
  "auto_id": NumberInt(245),
  "user_id": NumberInt(246),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T09:49:04.0Z"),
  "created": ISODate("2016-03-12T09:49:04.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41af25f66fbec0f000003"),
  "auto_id": NumberInt(246),
  "created": ISODate("2016-03-12T13:34:42.0Z"),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:34:42.0Z"),
  "role_id": NumberInt(1),
  "user_id": NumberInt(247)
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f475f66fb3c10000123"),
  "auto_id": NumberInt(247),
  "user_id": NumberInt(248),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:11.0Z"),
  "created": ISODate("2016-03-12T13:53:11.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f485f66fb3c1000012e"),
  "auto_id": NumberInt(248),
  "user_id": NumberInt(249),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:12.0Z"),
  "created": ISODate("2016-03-12T13:53:12.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f485f66fb3c10000139"),
  "auto_id": NumberInt(249),
  "user_id": NumberInt(250),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:12.0Z"),
  "created": ISODate("2016-03-12T13:53:12.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f485f66fb3c10000144"),
  "auto_id": NumberInt(250),
  "user_id": NumberInt(251),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:12.0Z"),
  "created": ISODate("2016-03-12T13:53:12.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f485f66fb3c1000014f"),
  "auto_id": NumberInt(251),
  "user_id": NumberInt(252),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:12.0Z"),
  "created": ISODate("2016-03-12T13:53:12.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f485f66fb3c1000015a"),
  "auto_id": NumberInt(252),
  "user_id": NumberInt(253),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:12.0Z"),
  "created": ISODate("2016-03-12T13:53:12.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f485f66fb3c10000165"),
  "auto_id": NumberInt(253),
  "user_id": NumberInt(254),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:12.0Z"),
  "created": ISODate("2016-03-12T13:53:12.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f485f66fb3c10000170"),
  "auto_id": NumberInt(254),
  "user_id": NumberInt(255),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:12.0Z"),
  "created": ISODate("2016-03-12T13:53:12.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f485f66fb3c1000017b"),
  "auto_id": NumberInt(255),
  "user_id": NumberInt(256),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:12.0Z"),
  "created": ISODate("2016-03-12T13:53:12.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f485f66fb3c10000186"),
  "auto_id": NumberInt(256),
  "user_id": NumberInt(257),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:12.0Z"),
  "created": ISODate("2016-03-12T13:53:12.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f495f66fb3c10000191"),
  "auto_id": NumberInt(257),
  "user_id": NumberInt(258),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:13.0Z"),
  "created": ISODate("2016-03-12T13:53:13.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f495f66fb3c1000019c"),
  "auto_id": NumberInt(258),
  "user_id": NumberInt(259),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:13.0Z"),
  "created": ISODate("2016-03-12T13:53:13.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f495f66fb3c100001a7"),
  "auto_id": NumberInt(259),
  "user_id": NumberInt(260),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:13.0Z"),
  "created": ISODate("2016-03-12T13:53:13.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f495f66fb3c100001b2"),
  "auto_id": NumberInt(260),
  "user_id": NumberInt(261),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:13.0Z"),
  "created": ISODate("2016-03-12T13:53:13.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f495f66fb3c100001bd"),
  "auto_id": NumberInt(261),
  "user_id": NumberInt(262),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:13.0Z"),
  "created": ISODate("2016-03-12T13:53:13.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f495f66fb3c100001c8"),
  "auto_id": NumberInt(262),
  "user_id": NumberInt(263),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:13.0Z"),
  "created": ISODate("2016-03-12T13:53:13.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f4a5f66fb3c100001d3"),
  "auto_id": NumberInt(263),
  "user_id": NumberInt(264),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:14.0Z"),
  "created": ISODate("2016-03-12T13:53:14.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f4a5f66fb3c100001de"),
  "auto_id": NumberInt(264),
  "user_id": NumberInt(265),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:14.0Z"),
  "created": ISODate("2016-03-12T13:53:14.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f4a5f66fb3c100001e9"),
  "auto_id": NumberInt(265),
  "user_id": NumberInt(266),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:14.0Z"),
  "created": ISODate("2016-03-12T13:53:14.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f4a5f66fb3c100001f4"),
  "auto_id": NumberInt(266),
  "user_id": NumberInt(267),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:14.0Z"),
  "created": ISODate("2016-03-12T13:53:14.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f4a5f66fb3c100001ff"),
  "auto_id": NumberInt(267),
  "user_id": NumberInt(268),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:14.0Z"),
  "created": ISODate("2016-03-12T13:53:14.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f4b5f66fb3c1000020a"),
  "auto_id": NumberInt(268),
  "user_id": NumberInt(269),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:15.0Z"),
  "created": ISODate("2016-03-12T13:53:15.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f4b5f66fb3c10000215"),
  "auto_id": NumberInt(269),
  "user_id": NumberInt(270),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:15.0Z"),
  "created": ISODate("2016-03-12T13:53:15.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f4b5f66fb3c10000220"),
  "auto_id": NumberInt(270),
  "user_id": NumberInt(271),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:15.0Z"),
  "created": ISODate("2016-03-12T13:53:15.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f4b5f66fb3c1000022b"),
  "auto_id": NumberInt(271),
  "user_id": NumberInt(272),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:15.0Z"),
  "created": ISODate("2016-03-12T13:53:15.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f4b5f66fb3c10000236"),
  "auto_id": NumberInt(272),
  "user_id": NumberInt(273),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:15.0Z"),
  "created": ISODate("2016-03-12T13:53:15.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f4b5f66fb3c10000241"),
  "auto_id": NumberInt(273),
  "user_id": NumberInt(274),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:15.0Z"),
  "created": ISODate("2016-03-12T13:53:15.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f4b5f66fb3c1000024c"),
  "auto_id": NumberInt(274),
  "user_id": NumberInt(275),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:15.0Z"),
  "created": ISODate("2016-03-12T13:53:15.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f4b5f66fb3c10000257"),
  "auto_id": NumberInt(275),
  "user_id": NumberInt(276),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:15.0Z"),
  "created": ISODate("2016-03-12T13:53:15.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f4b5f66fb3c10000262"),
  "auto_id": NumberInt(276),
  "user_id": NumberInt(277),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:15.0Z"),
  "created": ISODate("2016-03-12T13:53:15.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f4c5f66fb3c1000026d"),
  "auto_id": NumberInt(277),
  "user_id": NumberInt(278),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:16.0Z"),
  "created": ISODate("2016-03-12T13:53:16.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f4c5f66fb3c10000278"),
  "auto_id": NumberInt(278),
  "user_id": NumberInt(279),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:16.0Z"),
  "created": ISODate("2016-03-12T13:53:16.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f4c5f66fb3c10000283"),
  "auto_id": NumberInt(279),
  "user_id": NumberInt(280),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:16.0Z"),
  "created": ISODate("2016-03-12T13:53:16.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f4c5f66fb3c1000028e"),
  "auto_id": NumberInt(280),
  "user_id": NumberInt(281),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:16.0Z"),
  "created": ISODate("2016-03-12T13:53:16.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f4c5f66fb3c10000299"),
  "auto_id": NumberInt(281),
  "user_id": NumberInt(282),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:16.0Z"),
  "created": ISODate("2016-03-12T13:53:16.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f4c5f66fb3c100002a4"),
  "auto_id": NumberInt(282),
  "user_id": NumberInt(283),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:16.0Z"),
  "created": ISODate("2016-03-12T13:53:16.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f4c5f66fb3c100002af"),
  "auto_id": NumberInt(283),
  "user_id": NumberInt(284),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:16.0Z"),
  "created": ISODate("2016-03-12T13:53:16.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f4c5f66fb3c100002ba"),
  "auto_id": NumberInt(284),
  "user_id": NumberInt(285),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:16.0Z"),
  "created": ISODate("2016-03-12T13:53:16.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f4c5f66fb3c100002c5"),
  "auto_id": NumberInt(285),
  "user_id": NumberInt(286),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:16.0Z"),
  "created": ISODate("2016-03-12T13:53:16.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f4c5f66fb3c100002d0"),
  "auto_id": NumberInt(286),
  "user_id": NumberInt(287),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:16.0Z"),
  "created": ISODate("2016-03-12T13:53:16.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f4d5f66fb3c100002db"),
  "auto_id": NumberInt(287),
  "user_id": NumberInt(288),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:17.0Z"),
  "created": ISODate("2016-03-12T13:53:17.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f4d5f66fb3c100002e6"),
  "auto_id": NumberInt(288),
  "user_id": NumberInt(289),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:17.0Z"),
  "created": ISODate("2016-03-12T13:53:17.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f4d5f66fb3c100002f1"),
  "auto_id": NumberInt(289),
  "user_id": NumberInt(290),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:17.0Z"),
  "created": ISODate("2016-03-12T13:53:17.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f4d5f66fb3c100002fc"),
  "auto_id": NumberInt(290),
  "user_id": NumberInt(291),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:17.0Z"),
  "created": ISODate("2016-03-12T13:53:17.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f4d5f66fb3c10000307"),
  "auto_id": NumberInt(291),
  "user_id": NumberInt(292),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:17.0Z"),
  "created": ISODate("2016-03-12T13:53:17.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f4d5f66fb3c10000312"),
  "auto_id": NumberInt(292),
  "user_id": NumberInt(293),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:17.0Z"),
  "created": ISODate("2016-03-12T13:53:17.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f4e5f66fb3c1000031d"),
  "auto_id": NumberInt(293),
  "user_id": NumberInt(294),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:18.0Z"),
  "created": ISODate("2016-03-12T13:53:18.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f4e5f66fb3c10000328"),
  "auto_id": NumberInt(294),
  "user_id": NumberInt(295),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:18.0Z"),
  "created": ISODate("2016-03-12T13:53:18.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f4e5f66fb3c10000333"),
  "auto_id": NumberInt(295),
  "user_id": NumberInt(296),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:18.0Z"),
  "created": ISODate("2016-03-12T13:53:18.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f4e5f66fb3c1000033e"),
  "auto_id": NumberInt(296),
  "user_id": NumberInt(297),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:18.0Z"),
  "created": ISODate("2016-03-12T13:53:18.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f4e5f66fb3c10000349"),
  "auto_id": NumberInt(297),
  "user_id": NumberInt(298),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:18.0Z"),
  "created": ISODate("2016-03-12T13:53:18.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f4e5f66fb3c10000354"),
  "auto_id": NumberInt(298),
  "user_id": NumberInt(299),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:18.0Z"),
  "created": ISODate("2016-03-12T13:53:18.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f4e5f66fb3c1000035f"),
  "auto_id": NumberInt(299),
  "user_id": NumberInt(300),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:18.0Z"),
  "created": ISODate("2016-03-12T13:53:18.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f4f5f66fb3c1000036a"),
  "auto_id": NumberInt(300),
  "user_id": NumberInt(301),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:19.0Z"),
  "created": ISODate("2016-03-12T13:53:19.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f4f5f66fb3c10000375"),
  "auto_id": NumberInt(301),
  "user_id": NumberInt(302),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:19.0Z"),
  "created": ISODate("2016-03-12T13:53:19.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f4f5f66fb3c10000380"),
  "auto_id": NumberInt(302),
  "user_id": NumberInt(303),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:19.0Z"),
  "created": ISODate("2016-03-12T13:53:19.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f4f5f66fb3c1000038b"),
  "auto_id": NumberInt(303),
  "user_id": NumberInt(304),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:19.0Z"),
  "created": ISODate("2016-03-12T13:53:19.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f4f5f66fb3c10000396"),
  "auto_id": NumberInt(304),
  "user_id": NumberInt(305),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:19.0Z"),
  "created": ISODate("2016-03-12T13:53:19.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f4f5f66fb3c100003a1"),
  "auto_id": NumberInt(305),
  "user_id": NumberInt(306),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:19.0Z"),
  "created": ISODate("2016-03-12T13:53:19.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79865f66fb2415000274"),
  "auto_id": NumberInt(459),
  "user_id": NumberInt(4),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:31:50.0Z"),
  "created": ISODate("2016-03-17T09:31:50.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f4f5f66fb3c100003ac"),
  "auto_id": NumberInt(306),
  "user_id": NumberInt(307),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:19.0Z"),
  "created": ISODate("2016-03-12T13:53:19.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f505f66fb3c100003b7"),
  "auto_id": NumberInt(307),
  "user_id": NumberInt(308),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:20.0Z"),
  "created": ISODate("2016-03-12T13:53:20.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f505f66fb3c100003c2"),
  "auto_id": NumberInt(308),
  "user_id": NumberInt(309),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:20.0Z"),
  "created": ISODate("2016-03-12T13:53:20.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f505f66fb3c100003cd"),
  "auto_id": NumberInt(309),
  "user_id": NumberInt(310),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:20.0Z"),
  "created": ISODate("2016-03-12T13:53:20.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f505f66fb3c100003d8"),
  "auto_id": NumberInt(310),
  "user_id": NumberInt(311),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:20.0Z"),
  "created": ISODate("2016-03-12T13:53:20.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f505f66fb3c100003e3"),
  "auto_id": NumberInt(311),
  "user_id": NumberInt(312),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:20.0Z"),
  "created": ISODate("2016-03-12T13:53:20.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f505f66fb3c100003ee"),
  "auto_id": NumberInt(312),
  "user_id": NumberInt(313),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:20.0Z"),
  "created": ISODate("2016-03-12T13:53:20.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f505f66fb3c100003f9"),
  "auto_id": NumberInt(313),
  "user_id": NumberInt(314),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:20.0Z"),
  "created": ISODate("2016-03-12T13:53:20.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f505f66fb3c10000404"),
  "auto_id": NumberInt(314),
  "user_id": NumberInt(315),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:20.0Z"),
  "created": ISODate("2016-03-12T13:53:20.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f515f66fb3c1000040f"),
  "auto_id": NumberInt(315),
  "user_id": NumberInt(316),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:21.0Z"),
  "created": ISODate("2016-03-12T13:53:21.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f515f66fb3c1000041a"),
  "auto_id": NumberInt(316),
  "user_id": NumberInt(317),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:21.0Z"),
  "created": ISODate("2016-03-12T13:53:21.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f515f66fb3c10000425"),
  "auto_id": NumberInt(317),
  "user_id": NumberInt(318),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:21.0Z"),
  "created": ISODate("2016-03-12T13:53:21.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f515f66fb3c10000430"),
  "auto_id": NumberInt(318),
  "user_id": NumberInt(319),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:21.0Z"),
  "created": ISODate("2016-03-12T13:53:21.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f515f66fb3c1000043b"),
  "auto_id": NumberInt(319),
  "user_id": NumberInt(320),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:21.0Z"),
  "created": ISODate("2016-03-12T13:53:21.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f515f66fb3c10000446"),
  "auto_id": NumberInt(320),
  "user_id": NumberInt(321),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:21.0Z"),
  "created": ISODate("2016-03-12T13:53:21.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f515f66fb3c10000451"),
  "auto_id": NumberInt(321),
  "user_id": NumberInt(322),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:21.0Z"),
  "created": ISODate("2016-03-12T13:53:21.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f525f66fb3c1000045c"),
  "auto_id": NumberInt(322),
  "user_id": NumberInt(323),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:22.0Z"),
  "created": ISODate("2016-03-12T13:53:22.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f525f66fb3c10000467"),
  "auto_id": NumberInt(323),
  "user_id": NumberInt(324),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:22.0Z"),
  "created": ISODate("2016-03-12T13:53:22.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f525f66fb3c10000472"),
  "auto_id": NumberInt(324),
  "user_id": NumberInt(325),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:22.0Z"),
  "created": ISODate("2016-03-12T13:53:22.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f525f66fb3c1000047d"),
  "auto_id": NumberInt(325),
  "user_id": NumberInt(326),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:22.0Z"),
  "created": ISODate("2016-03-12T13:53:22.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f525f66fb3c10000488"),
  "auto_id": NumberInt(326),
  "user_id": NumberInt(327),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:22.0Z"),
  "created": ISODate("2016-03-12T13:53:22.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f525f66fb3c10000493"),
  "auto_id": NumberInt(327),
  "user_id": NumberInt(328),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:22.0Z"),
  "created": ISODate("2016-03-12T13:53:22.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f535f66fb3c1000049e"),
  "auto_id": NumberInt(328),
  "user_id": NumberInt(329),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:23.0Z"),
  "created": ISODate("2016-03-12T13:53:23.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f535f66fb3c100004a9"),
  "auto_id": NumberInt(329),
  "user_id": NumberInt(330),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:23.0Z"),
  "created": ISODate("2016-03-12T13:53:23.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f535f66fb3c100004b4"),
  "auto_id": NumberInt(330),
  "user_id": NumberInt(331),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:23.0Z"),
  "created": ISODate("2016-03-12T13:53:23.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f535f66fb3c100004bf"),
  "auto_id": NumberInt(331),
  "user_id": NumberInt(332),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:23.0Z"),
  "created": ISODate("2016-03-12T13:53:23.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f535f66fb3c100004ca"),
  "auto_id": NumberInt(332),
  "user_id": NumberInt(333),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:23.0Z"),
  "created": ISODate("2016-03-12T13:53:23.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f535f66fb3c100004d5"),
  "auto_id": NumberInt(333),
  "user_id": NumberInt(334),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:23.0Z"),
  "created": ISODate("2016-03-12T13:53:23.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f535f66fb3c100004e0"),
  "auto_id": NumberInt(334),
  "user_id": NumberInt(335),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:23.0Z"),
  "created": ISODate("2016-03-12T13:53:23.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f535f66fb3c100004eb"),
  "auto_id": NumberInt(335),
  "user_id": NumberInt(336),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:23.0Z"),
  "created": ISODate("2016-03-12T13:53:23.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f535f66fb3c100004f6"),
  "auto_id": NumberInt(336),
  "user_id": NumberInt(337),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:23.0Z"),
  "created": ISODate("2016-03-12T13:53:23.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f545f66fb3c10000501"),
  "auto_id": NumberInt(337),
  "user_id": NumberInt(338),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:24.0Z"),
  "created": ISODate("2016-03-12T13:53:24.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f545f66fb3c1000050c"),
  "auto_id": NumberInt(338),
  "user_id": NumberInt(339),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:24.0Z"),
  "created": ISODate("2016-03-12T13:53:24.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f545f66fb3c10000517"),
  "auto_id": NumberInt(339),
  "user_id": NumberInt(340),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:24.0Z"),
  "created": ISODate("2016-03-12T13:53:24.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f545f66fb3c10000522"),
  "auto_id": NumberInt(340),
  "user_id": NumberInt(341),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:24.0Z"),
  "created": ISODate("2016-03-12T13:53:24.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f545f66fb3c1000052d"),
  "auto_id": NumberInt(341),
  "user_id": NumberInt(342),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:24.0Z"),
  "created": ISODate("2016-03-12T13:53:24.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f545f66fb3c10000538"),
  "auto_id": NumberInt(342),
  "user_id": NumberInt(343),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:24.0Z"),
  "created": ISODate("2016-03-12T13:53:24.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f545f66fb3c10000543"),
  "auto_id": NumberInt(343),
  "user_id": NumberInt(344),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:24.0Z"),
  "created": ISODate("2016-03-12T13:53:24.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f545f66fb3c1000054e"),
  "auto_id": NumberInt(344),
  "user_id": NumberInt(345),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:24.0Z"),
  "created": ISODate("2016-03-12T13:53:24.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f555f66fb3c10000559"),
  "auto_id": NumberInt(345),
  "user_id": NumberInt(346),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:25.0Z"),
  "created": ISODate("2016-03-12T13:53:25.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f555f66fb3c10000564"),
  "auto_id": NumberInt(346),
  "user_id": NumberInt(347),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:25.0Z"),
  "created": ISODate("2016-03-12T13:53:25.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f555f66fb3c1000056f"),
  "auto_id": NumberInt(347),
  "user_id": NumberInt(348),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:25.0Z"),
  "created": ISODate("2016-03-12T13:53:25.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f555f66fb3c1000057a"),
  "auto_id": NumberInt(348),
  "user_id": NumberInt(349),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:25.0Z"),
  "created": ISODate("2016-03-12T13:53:25.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f565f66fb3c10000585"),
  "auto_id": NumberInt(349),
  "user_id": NumberInt(350),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:26.0Z"),
  "created": ISODate("2016-03-12T13:53:26.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f565f66fb3c10000590"),
  "auto_id": NumberInt(350),
  "user_id": NumberInt(351),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:26.0Z"),
  "created": ISODate("2016-03-12T13:53:26.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f565f66fb3c1000059b"),
  "auto_id": NumberInt(351),
  "user_id": NumberInt(352),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:26.0Z"),
  "created": ISODate("2016-03-12T13:53:26.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f565f66fb3c100005a6"),
  "auto_id": NumberInt(352),
  "user_id": NumberInt(353),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:26.0Z"),
  "created": ISODate("2016-03-12T13:53:26.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f565f66fb3c100005b1"),
  "auto_id": NumberInt(353),
  "user_id": NumberInt(354),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:26.0Z"),
  "created": ISODate("2016-03-12T13:53:26.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f565f66fb3c100005bc"),
  "auto_id": NumberInt(354),
  "user_id": NumberInt(355),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:26.0Z"),
  "created": ISODate("2016-03-12T13:53:26.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f565f66fb3c100005c7"),
  "auto_id": NumberInt(355),
  "user_id": NumberInt(356),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:26.0Z"),
  "created": ISODate("2016-03-12T13:53:26.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f565f66fb3c100005d2"),
  "auto_id": NumberInt(356),
  "user_id": NumberInt(357),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:26.0Z"),
  "created": ISODate("2016-03-12T13:53:26.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f575f66fb3c100005dd"),
  "auto_id": NumberInt(357),
  "user_id": NumberInt(358),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:27.0Z"),
  "created": ISODate("2016-03-12T13:53:27.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f575f66fb3c100005e8"),
  "auto_id": NumberInt(358),
  "user_id": NumberInt(359),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:27.0Z"),
  "created": ISODate("2016-03-12T13:53:27.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f575f66fb3c100005f3"),
  "auto_id": NumberInt(359),
  "user_id": NumberInt(360),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:27.0Z"),
  "created": ISODate("2016-03-12T13:53:27.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f575f66fb3c100005fe"),
  "auto_id": NumberInt(360),
  "user_id": NumberInt(361),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:27.0Z"),
  "created": ISODate("2016-03-12T13:53:27.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f575f66fb3c10000609"),
  "auto_id": NumberInt(361),
  "user_id": NumberInt(362),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:27.0Z"),
  "created": ISODate("2016-03-12T13:53:27.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f575f66fb3c10000614"),
  "auto_id": NumberInt(362),
  "user_id": NumberInt(363),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:27.0Z"),
  "created": ISODate("2016-03-12T13:53:27.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f575f66fb3c1000061f"),
  "auto_id": NumberInt(363),
  "user_id": NumberInt(364),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:27.0Z"),
  "created": ISODate("2016-03-12T13:53:27.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f575f66fb3c1000062a"),
  "auto_id": NumberInt(364),
  "user_id": NumberInt(365),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:27.0Z"),
  "created": ISODate("2016-03-12T13:53:27.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f575f66fb3c10000635"),
  "auto_id": NumberInt(365),
  "user_id": NumberInt(366),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:27.0Z"),
  "created": ISODate("2016-03-12T13:53:27.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f585f66fb3c10000640"),
  "auto_id": NumberInt(366),
  "user_id": NumberInt(367),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:28.0Z"),
  "created": ISODate("2016-03-12T13:53:28.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f585f66fb3c1000064b"),
  "auto_id": NumberInt(367),
  "user_id": NumberInt(368),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:28.0Z"),
  "created": ISODate("2016-03-12T13:53:28.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f595f66fb3c10000656"),
  "auto_id": NumberInt(368),
  "user_id": NumberInt(369),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:29.0Z"),
  "created": ISODate("2016-03-12T13:53:29.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f595f66fb3c10000661"),
  "auto_id": NumberInt(369),
  "user_id": NumberInt(370),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:29.0Z"),
  "created": ISODate("2016-03-12T13:53:29.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f595f66fb3c1000066c"),
  "auto_id": NumberInt(370),
  "user_id": NumberInt(371),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:29.0Z"),
  "created": ISODate("2016-03-12T13:53:29.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f595f66fb3c10000677"),
  "auto_id": NumberInt(371),
  "user_id": NumberInt(372),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:29.0Z"),
  "created": ISODate("2016-03-12T13:53:29.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f595f66fb3c10000682"),
  "auto_id": NumberInt(372),
  "user_id": NumberInt(373),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:29.0Z"),
  "created": ISODate("2016-03-12T13:53:29.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f595f66fb3c1000068d"),
  "auto_id": NumberInt(373),
  "user_id": NumberInt(374),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:29.0Z"),
  "created": ISODate("2016-03-12T13:53:29.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f595f66fb3c10000698"),
  "auto_id": NumberInt(374),
  "user_id": NumberInt(375),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:29.0Z"),
  "created": ISODate("2016-03-12T13:53:29.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f595f66fb3c100006a3"),
  "auto_id": NumberInt(375),
  "user_id": NumberInt(376),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:29.0Z"),
  "created": ISODate("2016-03-12T13:53:29.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f595f66fb3c100006ae"),
  "auto_id": NumberInt(376),
  "user_id": NumberInt(377),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:29.0Z"),
  "created": ISODate("2016-03-12T13:53:29.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f5a5f66fb3c100006b9"),
  "auto_id": NumberInt(377),
  "user_id": NumberInt(378),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:30.0Z"),
  "created": ISODate("2016-03-12T13:53:30.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f5a5f66fb3c100006c4"),
  "auto_id": NumberInt(378),
  "user_id": NumberInt(379),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:30.0Z"),
  "created": ISODate("2016-03-12T13:53:30.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f5a5f66fb3c100006cf"),
  "auto_id": NumberInt(379),
  "user_id": NumberInt(380),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:30.0Z"),
  "created": ISODate("2016-03-12T13:53:30.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f5a5f66fb3c100006da"),
  "auto_id": NumberInt(380),
  "user_id": NumberInt(381),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:30.0Z"),
  "created": ISODate("2016-03-12T13:53:30.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f5a5f66fb3c100006e5"),
  "auto_id": NumberInt(381),
  "user_id": NumberInt(382),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:30.0Z"),
  "created": ISODate("2016-03-12T13:53:30.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f5a5f66fb3c100006f0"),
  "auto_id": NumberInt(382),
  "user_id": NumberInt(383),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:30.0Z"),
  "created": ISODate("2016-03-12T13:53:30.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f5b5f66fb3c100006fb"),
  "auto_id": NumberInt(383),
  "user_id": NumberInt(384),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:31.0Z"),
  "created": ISODate("2016-03-12T13:53:31.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f5b5f66fb3c10000706"),
  "auto_id": NumberInt(384),
  "user_id": NumberInt(385),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:31.0Z"),
  "created": ISODate("2016-03-12T13:53:31.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f5b5f66fb3c10000711"),
  "auto_id": NumberInt(385),
  "user_id": NumberInt(386),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:31.0Z"),
  "created": ISODate("2016-03-12T13:53:31.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f5b5f66fb3c1000071c"),
  "auto_id": NumberInt(386),
  "user_id": NumberInt(387),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:31.0Z"),
  "created": ISODate("2016-03-12T13:53:31.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f5c5f66fb3c10000727"),
  "auto_id": NumberInt(387),
  "user_id": NumberInt(388),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:32.0Z"),
  "created": ISODate("2016-03-12T13:53:32.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f5c5f66fb3c10000732"),
  "auto_id": NumberInt(388),
  "user_id": NumberInt(389),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:32.0Z"),
  "created": ISODate("2016-03-12T13:53:32.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f5c5f66fb3c1000073d"),
  "auto_id": NumberInt(389),
  "user_id": NumberInt(390),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:32.0Z"),
  "created": ISODate("2016-03-12T13:53:32.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f5c5f66fb3c10000748"),
  "auto_id": NumberInt(390),
  "user_id": NumberInt(391),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:32.0Z"),
  "created": ISODate("2016-03-12T13:53:32.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f5c5f66fb3c10000753"),
  "auto_id": NumberInt(391),
  "user_id": NumberInt(392),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:32.0Z"),
  "created": ISODate("2016-03-12T13:53:32.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f5c5f66fb3c1000075e"),
  "auto_id": NumberInt(392),
  "user_id": NumberInt(393),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:32.0Z"),
  "created": ISODate("2016-03-12T13:53:32.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f5c5f66fb3c10000769"),
  "auto_id": NumberInt(393),
  "user_id": NumberInt(394),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:32.0Z"),
  "created": ISODate("2016-03-12T13:53:32.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f5c5f66fb3c10000774"),
  "auto_id": NumberInt(394),
  "user_id": NumberInt(395),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:32.0Z"),
  "created": ISODate("2016-03-12T13:53:32.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f5c5f66fb3c1000077f"),
  "auto_id": NumberInt(395),
  "user_id": NumberInt(396),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:32.0Z"),
  "created": ISODate("2016-03-12T13:53:32.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f5d5f66fb3c1000078a"),
  "auto_id": NumberInt(396),
  "user_id": NumberInt(397),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:33.0Z"),
  "created": ISODate("2016-03-12T13:53:33.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f5d5f66fb3c10000795"),
  "auto_id": NumberInt(397),
  "user_id": NumberInt(398),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:33.0Z"),
  "created": ISODate("2016-03-12T13:53:33.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f5d5f66fb3c100007a0"),
  "auto_id": NumberInt(398),
  "user_id": NumberInt(399),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:33.0Z"),
  "created": ISODate("2016-03-12T13:53:33.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f5e5f66fb3c100007ab"),
  "auto_id": NumberInt(399),
  "user_id": NumberInt(400),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:34.0Z"),
  "created": ISODate("2016-03-12T13:53:34.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f5e5f66fb3c100007b6"),
  "auto_id": NumberInt(400),
  "user_id": NumberInt(401),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:34.0Z"),
  "created": ISODate("2016-03-12T13:53:34.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f5e5f66fb3c100007c1"),
  "auto_id": NumberInt(401),
  "user_id": NumberInt(402),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:34.0Z"),
  "created": ISODate("2016-03-12T13:53:34.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f5e5f66fb3c100007cc"),
  "auto_id": NumberInt(402),
  "user_id": NumberInt(403),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:34.0Z"),
  "created": ISODate("2016-03-12T13:53:34.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f5e5f66fb3c100007d7"),
  "auto_id": NumberInt(403),
  "user_id": NumberInt(404),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:34.0Z"),
  "created": ISODate("2016-03-12T13:53:34.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f5e5f66fb3c100007e2"),
  "auto_id": NumberInt(404),
  "user_id": NumberInt(405),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:34.0Z"),
  "created": ISODate("2016-03-12T13:53:34.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f5e5f66fb3c100007ed"),
  "auto_id": NumberInt(405),
  "user_id": NumberInt(406),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:34.0Z"),
  "created": ISODate("2016-03-12T13:53:34.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f5e5f66fb3c100007f8"),
  "auto_id": NumberInt(406),
  "user_id": NumberInt(407),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:34.0Z"),
  "created": ISODate("2016-03-12T13:53:34.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f5f5f66fb3c10000803"),
  "auto_id": NumberInt(407),
  "user_id": NumberInt(408),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:35.0Z"),
  "created": ISODate("2016-03-12T13:53:35.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f5f5f66fb3c1000080e"),
  "auto_id": NumberInt(408),
  "user_id": NumberInt(409),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:35.0Z"),
  "created": ISODate("2016-03-12T13:53:35.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f5f5f66fb3c10000819"),
  "auto_id": NumberInt(409),
  "user_id": NumberInt(410),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:35.0Z"),
  "created": ISODate("2016-03-12T13:53:35.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f605f66fb3c10000824"),
  "auto_id": NumberInt(410),
  "user_id": NumberInt(411),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:36.0Z"),
  "created": ISODate("2016-03-12T13:53:36.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f605f66fb3c1000082f"),
  "auto_id": NumberInt(411),
  "user_id": NumberInt(412),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:36.0Z"),
  "created": ISODate("2016-03-12T13:53:36.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f605f66fb3c1000083a"),
  "auto_id": NumberInt(412),
  "user_id": NumberInt(413),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:36.0Z"),
  "created": ISODate("2016-03-12T13:53:36.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f605f66fb3c10000845"),
  "auto_id": NumberInt(413),
  "user_id": NumberInt(414),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:36.0Z"),
  "created": ISODate("2016-03-12T13:53:36.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f605f66fb3c10000850"),
  "auto_id": NumberInt(414),
  "user_id": NumberInt(415),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:36.0Z"),
  "created": ISODate("2016-03-12T13:53:36.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f605f66fb3c1000085b"),
  "auto_id": NumberInt(415),
  "user_id": NumberInt(416),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:36.0Z"),
  "created": ISODate("2016-03-12T13:53:36.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f605f66fb3c10000866"),
  "auto_id": NumberInt(416),
  "user_id": NumberInt(417),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:36.0Z"),
  "created": ISODate("2016-03-12T13:53:36.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f615f66fb3c10000871"),
  "auto_id": NumberInt(417),
  "user_id": NumberInt(418),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:37.0Z"),
  "created": ISODate("2016-03-12T13:53:37.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f615f66fb3c1000087c"),
  "auto_id": NumberInt(418),
  "user_id": NumberInt(419),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:37.0Z"),
  "created": ISODate("2016-03-12T13:53:37.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f615f66fb3c10000887"),
  "auto_id": NumberInt(419),
  "user_id": NumberInt(420),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:37.0Z"),
  "created": ISODate("2016-03-12T13:53:37.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f615f66fb3c10000892"),
  "auto_id": NumberInt(420),
  "user_id": NumberInt(421),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:37.0Z"),
  "created": ISODate("2016-03-12T13:53:37.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f615f66fb3c1000089d"),
  "auto_id": NumberInt(421),
  "user_id": NumberInt(422),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:37.0Z"),
  "created": ISODate("2016-03-12T13:53:37.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f615f66fb3c100008a8"),
  "auto_id": NumberInt(422),
  "user_id": NumberInt(423),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:37.0Z"),
  "created": ISODate("2016-03-12T13:53:37.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f615f66fb3c100008b3"),
  "auto_id": NumberInt(423),
  "user_id": NumberInt(424),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:37.0Z"),
  "created": ISODate("2016-03-12T13:53:37.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f615f66fb3c100008be"),
  "auto_id": NumberInt(424),
  "user_id": NumberInt(425),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:37.0Z"),
  "created": ISODate("2016-03-12T13:53:37.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f625f66fb3c100008c9"),
  "auto_id": NumberInt(425),
  "user_id": NumberInt(426),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:38.0Z"),
  "created": ISODate("2016-03-12T13:53:38.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f625f66fb3c100008d4"),
  "auto_id": NumberInt(426),
  "user_id": NumberInt(427),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:38.0Z"),
  "created": ISODate("2016-03-12T13:53:38.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f625f66fb3c100008df"),
  "auto_id": NumberInt(427),
  "user_id": NumberInt(428),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:38.0Z"),
  "created": ISODate("2016-03-12T13:53:38.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f635f66fb3c100008ea"),
  "auto_id": NumberInt(428),
  "user_id": NumberInt(429),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:39.0Z"),
  "created": ISODate("2016-03-12T13:53:39.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f635f66fb3c100008f5"),
  "auto_id": NumberInt(429),
  "user_id": NumberInt(430),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:39.0Z"),
  "created": ISODate("2016-03-12T13:53:39.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f635f66fb3c10000900"),
  "auto_id": NumberInt(430),
  "user_id": NumberInt(431),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:39.0Z"),
  "created": ISODate("2016-03-12T13:53:39.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f635f66fb3c1000090b"),
  "auto_id": NumberInt(431),
  "user_id": NumberInt(432),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:39.0Z"),
  "created": ISODate("2016-03-12T13:53:39.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f635f66fb3c10000916"),
  "auto_id": NumberInt(432),
  "user_id": NumberInt(433),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:39.0Z"),
  "created": ISODate("2016-03-12T13:53:39.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f635f66fb3c10000921"),
  "auto_id": NumberInt(433),
  "user_id": NumberInt(434),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:39.0Z"),
  "created": ISODate("2016-03-12T13:53:39.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f635f66fb3c1000092c"),
  "auto_id": NumberInt(434),
  "user_id": NumberInt(435),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:39.0Z"),
  "created": ISODate("2016-03-12T13:53:39.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f635f66fb3c10000937"),
  "auto_id": NumberInt(435),
  "user_id": NumberInt(436),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:39.0Z"),
  "created": ISODate("2016-03-12T13:53:39.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f645f66fb3c10000942"),
  "auto_id": NumberInt(436),
  "user_id": NumberInt(437),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:40.0Z"),
  "created": ISODate("2016-03-12T13:53:40.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f645f66fb3c1000094d"),
  "auto_id": NumberInt(437),
  "user_id": NumberInt(438),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:40.0Z"),
  "created": ISODate("2016-03-12T13:53:40.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f655f66fb3c10000958"),
  "auto_id": NumberInt(438),
  "user_id": NumberInt(439),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:41.0Z"),
  "created": ISODate("2016-03-12T13:53:41.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f655f66fb3c10000963"),
  "auto_id": NumberInt(439),
  "user_id": NumberInt(440),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:41.0Z"),
  "created": ISODate("2016-03-12T13:53:41.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f655f66fb3c1000096e"),
  "auto_id": NumberInt(440),
  "user_id": NumberInt(441),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:41.0Z"),
  "created": ISODate("2016-03-12T13:53:41.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f655f66fb3c10000979"),
  "auto_id": NumberInt(441),
  "user_id": NumberInt(442),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:41.0Z"),
  "created": ISODate("2016-03-12T13:53:41.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f655f66fb3c10000984"),
  "auto_id": NumberInt(442),
  "user_id": NumberInt(443),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:41.0Z"),
  "created": ISODate("2016-03-12T13:53:41.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f655f66fb3c1000098f"),
  "auto_id": NumberInt(443),
  "user_id": NumberInt(444),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:41.0Z"),
  "created": ISODate("2016-03-12T13:53:41.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f655f66fb3c1000099a"),
  "auto_id": NumberInt(444),
  "user_id": NumberInt(445),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:41.0Z"),
  "created": ISODate("2016-03-12T13:53:41.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f655f66fb3c100009a5"),
  "auto_id": NumberInt(445),
  "user_id": NumberInt(446),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:41.0Z"),
  "created": ISODate("2016-03-12T13:53:41.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e41f655f66fb3c100009b0"),
  "auto_id": NumberInt(446),
  "user_id": NumberInt(447),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-12T13:53:41.0Z"),
  "created": ISODate("2016-03-12T13:53:41.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e68a355f66fbc80f00033b"),
  "auto_id": NumberInt(447),
  "role_id": NumberInt(1),
  "user_id": NumberInt(448),
  "default": "yes",
  "modified": ISODate("2016-03-14T09:53:57.0Z"),
  "created": ISODate("2016-03-14T09:53:57.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e6ae1f5f66fb9c0f000004"),
  "auto_id": NumberInt(448),
  "user_id": NumberInt(449),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-14T12:27:11.0Z"),
  "created": ISODate("2016-03-14T12:27:11.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e6ae1f5f66fb9c0f000011"),
  "auto_id": NumberInt(450),
  "user_id": NumberInt(450),
  "role_id": NumberInt(4),
  "default": "yes",
  "modified": ISODate("2016-03-14T12:27:11.0Z"),
  "created": ISODate("2016-03-14T12:27:11.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e6af245f66fbb418000002"),
  "auto_id": NumberInt(451),
  "user_id": NumberInt(451),
  "role_id": NumberInt(4),
  "default": "yes",
  "modified": ISODate("2016-03-14T12:31:32.0Z"),
  "created": ISODate("2016-03-14T12:31:32.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e6b12c5f66fb5c17000002"),
  "auto_id": NumberInt(452),
  "user_id": NumberInt(452),
  "role_id": NumberInt(6),
  "default": "yes",
  "modified": ISODate("2016-03-14T12:40:12.0Z"),
  "created": ISODate("2016-03-14T12:40:12.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e6b17a5f66fb5c1700000d"),
  "auto_id": NumberInt(453),
  "user_id": NumberInt(453),
  "role_id": NumberInt(6),
  "default": "yes",
  "modified": ISODate("2016-03-14T12:41:30.0Z"),
  "created": ISODate("2016-03-14T12:41:30.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56e6b2985f66fb5415000002"),
  "auto_id": NumberInt(454),
  "user_id": NumberInt(454),
  "role_id": NumberInt(5),
  "default": "yes",
  "modified": ISODate("2016-03-14T12:46:16.0Z"),
  "created": ISODate("2016-03-14T12:46:16.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea74005f66fbc80e000003"),
  "auto_id": NumberInt(455),
  "user_id": NumberInt(2),
  "role_id": NumberInt(1),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:08:16.0Z"),
  "created": ISODate("2016-03-17T09:08:16.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79855f66fb2415000267"),
  "auto_id": NumberInt(456),
  "user_id": NumberInt(3),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:31:49.0Z"),
  "created": ISODate("2016-03-17T09:31:49.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79865f66fb2415000273"),
  "auto_id": NumberInt(458),
  "user_id": NumberInt(4),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:31:50.0Z"),
  "created": ISODate("2016-03-17T09:31:50.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79865f66fb241500027f"),
  "auto_id": NumberInt(460),
  "user_id": NumberInt(5),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:31:50.0Z"),
  "created": ISODate("2016-03-17T09:31:50.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79865f66fb2415000280"),
  "auto_id": NumberInt(461),
  "user_id": NumberInt(5),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:31:50.0Z"),
  "created": ISODate("2016-03-17T09:31:50.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79865f66fb241500028b"),
  "auto_id": NumberInt(462),
  "user_id": NumberInt(6),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:31:50.0Z"),
  "created": ISODate("2016-03-17T09:31:50.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79865f66fb241500028c"),
  "auto_id": NumberInt(463),
  "user_id": NumberInt(6),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:31:50.0Z"),
  "created": ISODate("2016-03-17T09:31:50.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79865f66fb2415000297"),
  "auto_id": NumberInt(464),
  "user_id": NumberInt(7),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:31:50.0Z"),
  "created": ISODate("2016-03-17T09:31:50.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79865f66fb2415000298"),
  "auto_id": NumberInt(465),
  "user_id": NumberInt(7),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:31:50.0Z"),
  "created": ISODate("2016-03-17T09:31:50.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79865f66fb24150002a3"),
  "auto_id": NumberInt(466),
  "user_id": NumberInt(8),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:31:50.0Z"),
  "created": ISODate("2016-03-17T09:31:50.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79865f66fb24150002a4"),
  "auto_id": NumberInt(467),
  "user_id": NumberInt(8),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:31:50.0Z"),
  "created": ISODate("2016-03-17T09:31:50.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79865f66fb24150002af"),
  "auto_id": NumberInt(468),
  "user_id": NumberInt(9),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:31:50.0Z"),
  "created": ISODate("2016-03-17T09:31:50.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79865f66fb24150002b0"),
  "auto_id": NumberInt(469),
  "user_id": NumberInt(9),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:31:50.0Z"),
  "created": ISODate("2016-03-17T09:31:50.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79865f66fb24150002bb"),
  "auto_id": NumberInt(470),
  "user_id": NumberInt(10),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:31:50.0Z"),
  "created": ISODate("2016-03-17T09:31:50.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79865f66fb24150002bc"),
  "auto_id": NumberInt(471),
  "user_id": NumberInt(10),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:31:50.0Z"),
  "created": ISODate("2016-03-17T09:31:50.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79865f66fb24150002c7"),
  "auto_id": NumberInt(472),
  "user_id": NumberInt(11),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:31:50.0Z"),
  "created": ISODate("2016-03-17T09:31:50.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79865f66fb24150002c8"),
  "auto_id": NumberInt(473),
  "user_id": NumberInt(11),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:31:50.0Z"),
  "created": ISODate("2016-03-17T09:31:50.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79865f66fb24150002d3"),
  "auto_id": NumberInt(474),
  "user_id": NumberInt(12),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:31:50.0Z"),
  "created": ISODate("2016-03-17T09:31:50.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79865f66fb24150002d4"),
  "auto_id": NumberInt(475),
  "user_id": NumberInt(12),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:31:50.0Z"),
  "created": ISODate("2016-03-17T09:31:50.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79875f66fb24150002df"),
  "auto_id": NumberInt(476),
  "user_id": NumberInt(13),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:31:51.0Z"),
  "created": ISODate("2016-03-17T09:31:51.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79875f66fb24150002e0"),
  "auto_id": NumberInt(477),
  "user_id": NumberInt(13),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:31:51.0Z"),
  "created": ISODate("2016-03-17T09:31:51.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79875f66fb24150002eb"),
  "auto_id": NumberInt(478),
  "user_id": NumberInt(14),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:31:51.0Z"),
  "created": ISODate("2016-03-17T09:31:51.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79875f66fb24150002ec"),
  "auto_id": NumberInt(479),
  "user_id": NumberInt(14),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:31:51.0Z"),
  "created": ISODate("2016-03-17T09:31:51.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79875f66fb24150002f7"),
  "auto_id": NumberInt(480),
  "user_id": NumberInt(15),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:31:51.0Z"),
  "created": ISODate("2016-03-17T09:31:51.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79875f66fb24150002f8"),
  "auto_id": NumberInt(481),
  "user_id": NumberInt(15),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:31:51.0Z"),
  "created": ISODate("2016-03-17T09:31:51.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79875f66fb2415000303"),
  "auto_id": NumberInt(482),
  "user_id": NumberInt(16),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:31:51.0Z"),
  "created": ISODate("2016-03-17T09:31:51.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79875f66fb2415000304"),
  "auto_id": NumberInt(483),
  "user_id": NumberInt(16),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:31:51.0Z"),
  "created": ISODate("2016-03-17T09:31:51.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79875f66fb241500030f"),
  "auto_id": NumberInt(484),
  "user_id": NumberInt(17),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:31:51.0Z"),
  "created": ISODate("2016-03-17T09:31:51.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79875f66fb2415000310"),
  "auto_id": NumberInt(485),
  "user_id": NumberInt(17),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:31:51.0Z"),
  "created": ISODate("2016-03-17T09:31:51.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79885f66fb241500031b"),
  "auto_id": NumberInt(486),
  "user_id": NumberInt(18),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:31:52.0Z"),
  "created": ISODate("2016-03-17T09:31:52.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79885f66fb241500031c"),
  "auto_id": NumberInt(487),
  "user_id": NumberInt(18),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:31:52.0Z"),
  "created": ISODate("2016-03-17T09:31:52.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79885f66fb2415000327"),
  "auto_id": NumberInt(488),
  "user_id": NumberInt(19),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:31:52.0Z"),
  "created": ISODate("2016-03-17T09:31:52.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79885f66fb2415000328"),
  "auto_id": NumberInt(489),
  "user_id": NumberInt(19),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:31:52.0Z"),
  "created": ISODate("2016-03-17T09:31:52.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79885f66fb2415000333"),
  "auto_id": NumberInt(490),
  "user_id": NumberInt(20),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:31:52.0Z"),
  "created": ISODate("2016-03-17T09:31:52.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79885f66fb2415000334"),
  "auto_id": NumberInt(491),
  "user_id": NumberInt(20),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:31:52.0Z"),
  "created": ISODate("2016-03-17T09:31:52.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79885f66fb241500033f"),
  "auto_id": NumberInt(492),
  "user_id": NumberInt(21),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:31:52.0Z"),
  "created": ISODate("2016-03-17T09:31:52.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79885f66fb2415000340"),
  "auto_id": NumberInt(493),
  "user_id": NumberInt(21),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:31:52.0Z"),
  "created": ISODate("2016-03-17T09:31:52.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79885f66fb241500034b"),
  "auto_id": NumberInt(494),
  "user_id": NumberInt(22),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:31:52.0Z"),
  "created": ISODate("2016-03-17T09:31:52.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79885f66fb241500034c"),
  "auto_id": NumberInt(495),
  "user_id": NumberInt(22),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:31:52.0Z"),
  "created": ISODate("2016-03-17T09:31:52.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79885f66fb2415000357"),
  "auto_id": NumberInt(496),
  "user_id": NumberInt(23),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:31:52.0Z"),
  "created": ISODate("2016-03-17T09:31:52.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79885f66fb2415000358"),
  "auto_id": NumberInt(497),
  "user_id": NumberInt(23),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:31:52.0Z"),
  "created": ISODate("2016-03-17T09:31:52.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79895f66fb2415000363"),
  "auto_id": NumberInt(498),
  "user_id": NumberInt(24),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:31:53.0Z"),
  "created": ISODate("2016-03-17T09:31:53.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79895f66fb2415000364"),
  "auto_id": NumberInt(499),
  "user_id": NumberInt(24),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:31:53.0Z"),
  "created": ISODate("2016-03-17T09:31:53.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79895f66fb241500036f"),
  "auto_id": NumberInt(500),
  "user_id": NumberInt(25),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:31:53.0Z"),
  "created": ISODate("2016-03-17T09:31:53.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79895f66fb2415000370"),
  "auto_id": NumberInt(501),
  "user_id": NumberInt(25),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:31:53.0Z"),
  "created": ISODate("2016-03-17T09:31:53.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79895f66fb241500037b"),
  "auto_id": NumberInt(502),
  "user_id": NumberInt(26),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:31:53.0Z"),
  "created": ISODate("2016-03-17T09:31:53.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79895f66fb241500037c"),
  "auto_id": NumberInt(503),
  "user_id": NumberInt(26),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:31:53.0Z"),
  "created": ISODate("2016-03-17T09:31:53.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79895f66fb2415000387"),
  "auto_id": NumberInt(504),
  "user_id": NumberInt(27),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:31:53.0Z"),
  "created": ISODate("2016-03-17T09:31:53.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79895f66fb2415000388"),
  "auto_id": NumberInt(505),
  "user_id": NumberInt(27),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:31:53.0Z"),
  "created": ISODate("2016-03-17T09:31:53.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79895f66fb2415000393"),
  "auto_id": NumberInt(506),
  "user_id": NumberInt(28),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:31:53.0Z"),
  "created": ISODate("2016-03-17T09:31:53.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79895f66fb2415000394"),
  "auto_id": NumberInt(507),
  "user_id": NumberInt(28),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:31:53.0Z"),
  "created": ISODate("2016-03-17T09:31:53.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79895f66fb241500039f"),
  "auto_id": NumberInt(508),
  "user_id": NumberInt(29),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:31:53.0Z"),
  "created": ISODate("2016-03-17T09:31:53.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79895f66fb24150003a0"),
  "auto_id": NumberInt(509),
  "user_id": NumberInt(29),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:31:53.0Z"),
  "created": ISODate("2016-03-17T09:31:53.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79895f66fb24150003ab"),
  "auto_id": NumberInt(510),
  "user_id": NumberInt(30),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:31:53.0Z"),
  "created": ISODate("2016-03-17T09:31:53.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79895f66fb24150003ac"),
  "auto_id": NumberInt(511),
  "user_id": NumberInt(30),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:31:53.0Z"),
  "created": ISODate("2016-03-17T09:31:53.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79895f66fb24150003b7"),
  "auto_id": NumberInt(512),
  "user_id": NumberInt(31),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:31:53.0Z"),
  "created": ISODate("2016-03-17T09:31:53.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79895f66fb24150003b8"),
  "auto_id": NumberInt(513),
  "user_id": NumberInt(31),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:31:53.0Z"),
  "created": ISODate("2016-03-17T09:31:53.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea798a5f66fb24150003c3"),
  "auto_id": NumberInt(514),
  "user_id": NumberInt(32),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:31:54.0Z"),
  "created": ISODate("2016-03-17T09:31:54.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea798a5f66fb24150003c4"),
  "auto_id": NumberInt(515),
  "user_id": NumberInt(32),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:31:54.0Z"),
  "created": ISODate("2016-03-17T09:31:54.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea798a5f66fb24150003cf"),
  "auto_id": NumberInt(516),
  "user_id": NumberInt(33),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:31:54.0Z"),
  "created": ISODate("2016-03-17T09:31:54.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea798a5f66fb24150003d0"),
  "auto_id": NumberInt(517),
  "user_id": NumberInt(33),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:31:54.0Z"),
  "created": ISODate("2016-03-17T09:31:54.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea798a5f66fb24150003db"),
  "auto_id": NumberInt(518),
  "user_id": NumberInt(34),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:31:54.0Z"),
  "created": ISODate("2016-03-17T09:31:54.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea798a5f66fb24150003dc"),
  "auto_id": NumberInt(519),
  "user_id": NumberInt(34),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:31:54.0Z"),
  "created": ISODate("2016-03-17T09:31:54.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea798a5f66fb24150003e7"),
  "auto_id": NumberInt(520),
  "user_id": NumberInt(35),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:31:54.0Z"),
  "created": ISODate("2016-03-17T09:31:54.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea798a5f66fb24150003e8"),
  "auto_id": NumberInt(521),
  "user_id": NumberInt(35),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:31:54.0Z"),
  "created": ISODate("2016-03-17T09:31:54.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea798a5f66fb24150003f3"),
  "auto_id": NumberInt(522),
  "user_id": NumberInt(36),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:31:54.0Z"),
  "created": ISODate("2016-03-17T09:31:54.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea798a5f66fb24150003f4"),
  "auto_id": NumberInt(523),
  "user_id": NumberInt(36),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:31:54.0Z"),
  "created": ISODate("2016-03-17T09:31:54.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea798a5f66fb24150003ff"),
  "auto_id": NumberInt(524),
  "user_id": NumberInt(37),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:31:54.0Z"),
  "created": ISODate("2016-03-17T09:31:54.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea798a5f66fb2415000400"),
  "auto_id": NumberInt(525),
  "user_id": NumberInt(37),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:31:54.0Z"),
  "created": ISODate("2016-03-17T09:31:54.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea798b5f66fb241500040b"),
  "auto_id": NumberInt(526),
  "user_id": NumberInt(38),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:31:55.0Z"),
  "created": ISODate("2016-03-17T09:31:55.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea798b5f66fb241500040c"),
  "auto_id": NumberInt(527),
  "user_id": NumberInt(38),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:31:55.0Z"),
  "created": ISODate("2016-03-17T09:31:55.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea798b5f66fb2415000417"),
  "auto_id": NumberInt(528),
  "user_id": NumberInt(39),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:31:55.0Z"),
  "created": ISODate("2016-03-17T09:31:55.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea798b5f66fb2415000418"),
  "auto_id": NumberInt(529),
  "user_id": NumberInt(39),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:31:55.0Z"),
  "created": ISODate("2016-03-17T09:31:55.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea798b5f66fb2415000423"),
  "auto_id": NumberInt(530),
  "user_id": NumberInt(40),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:31:55.0Z"),
  "created": ISODate("2016-03-17T09:31:55.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea798b5f66fb2415000424"),
  "auto_id": NumberInt(531),
  "user_id": NumberInt(40),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:31:55.0Z"),
  "created": ISODate("2016-03-17T09:31:55.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea798b5f66fb241500042f"),
  "auto_id": NumberInt(532),
  "user_id": NumberInt(41),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:31:55.0Z"),
  "created": ISODate("2016-03-17T09:31:55.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea798b5f66fb2415000430"),
  "auto_id": NumberInt(533),
  "user_id": NumberInt(41),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:31:55.0Z"),
  "created": ISODate("2016-03-17T09:31:55.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea798b5f66fb241500043b"),
  "auto_id": NumberInt(534),
  "user_id": NumberInt(42),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:31:55.0Z"),
  "created": ISODate("2016-03-17T09:31:55.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea798b5f66fb241500043c"),
  "auto_id": NumberInt(535),
  "user_id": NumberInt(42),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:31:55.0Z"),
  "created": ISODate("2016-03-17T09:31:55.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea798c5f66fb2415000447"),
  "auto_id": NumberInt(536),
  "user_id": NumberInt(43),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:31:56.0Z"),
  "created": ISODate("2016-03-17T09:31:56.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea798c5f66fb2415000448"),
  "auto_id": NumberInt(537),
  "user_id": NumberInt(43),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:31:56.0Z"),
  "created": ISODate("2016-03-17T09:31:56.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea798c5f66fb2415000453"),
  "auto_id": NumberInt(538),
  "user_id": NumberInt(44),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:31:56.0Z"),
  "created": ISODate("2016-03-17T09:31:56.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea798c5f66fb2415000454"),
  "auto_id": NumberInt(539),
  "user_id": NumberInt(44),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:31:56.0Z"),
  "created": ISODate("2016-03-17T09:31:56.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea798c5f66fb241500045f"),
  "auto_id": NumberInt(540),
  "user_id": NumberInt(45),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:31:56.0Z"),
  "created": ISODate("2016-03-17T09:31:56.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea798c5f66fb2415000460"),
  "auto_id": NumberInt(541),
  "user_id": NumberInt(45),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:31:56.0Z"),
  "created": ISODate("2016-03-17T09:31:56.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea798c5f66fb241500046b"),
  "auto_id": NumberInt(542),
  "user_id": NumberInt(46),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:31:56.0Z"),
  "created": ISODate("2016-03-17T09:31:56.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea798c5f66fb241500046c"),
  "auto_id": NumberInt(543),
  "user_id": NumberInt(46),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:31:56.0Z"),
  "created": ISODate("2016-03-17T09:31:56.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea798c5f66fb2415000477"),
  "auto_id": NumberInt(544),
  "user_id": NumberInt(47),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:31:56.0Z"),
  "created": ISODate("2016-03-17T09:31:56.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea798c5f66fb2415000478"),
  "auto_id": NumberInt(545),
  "user_id": NumberInt(47),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:31:56.0Z"),
  "created": ISODate("2016-03-17T09:31:56.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea798c5f66fb2415000483"),
  "auto_id": NumberInt(546),
  "user_id": NumberInt(48),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:31:56.0Z"),
  "created": ISODate("2016-03-17T09:31:56.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea798c5f66fb2415000484"),
  "auto_id": NumberInt(547),
  "user_id": NumberInt(48),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:31:56.0Z"),
  "created": ISODate("2016-03-17T09:31:56.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea798c5f66fb241500048f"),
  "auto_id": NumberInt(548),
  "user_id": NumberInt(49),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:31:56.0Z"),
  "created": ISODate("2016-03-17T09:31:56.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea798c5f66fb2415000490"),
  "auto_id": NumberInt(549),
  "user_id": NumberInt(49),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:31:56.0Z"),
  "created": ISODate("2016-03-17T09:31:56.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea798c5f66fb241500049b"),
  "auto_id": NumberInt(550),
  "user_id": NumberInt(50),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:31:56.0Z"),
  "created": ISODate("2016-03-17T09:31:56.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea798c5f66fb241500049c"),
  "auto_id": NumberInt(551),
  "user_id": NumberInt(50),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:31:56.0Z"),
  "created": ISODate("2016-03-17T09:31:56.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea798d5f66fb24150004a7"),
  "auto_id": NumberInt(552),
  "user_id": NumberInt(51),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:31:57.0Z"),
  "created": ISODate("2016-03-17T09:31:57.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea798d5f66fb24150004a8"),
  "auto_id": NumberInt(553),
  "user_id": NumberInt(51),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:31:57.0Z"),
  "created": ISODate("2016-03-17T09:31:57.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea798d5f66fb24150004b3"),
  "auto_id": NumberInt(554),
  "user_id": NumberInt(52),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:31:57.0Z"),
  "created": ISODate("2016-03-17T09:31:57.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea798d5f66fb24150004b4"),
  "auto_id": NumberInt(555),
  "user_id": NumberInt(52),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:31:57.0Z"),
  "created": ISODate("2016-03-17T09:31:57.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea798d5f66fb24150004bf"),
  "auto_id": NumberInt(556),
  "user_id": NumberInt(53),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:31:57.0Z"),
  "created": ISODate("2016-03-17T09:31:57.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea798d5f66fb24150004c0"),
  "auto_id": NumberInt(557),
  "user_id": NumberInt(53),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:31:57.0Z"),
  "created": ISODate("2016-03-17T09:31:57.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea798d5f66fb24150004cb"),
  "auto_id": NumberInt(558),
  "user_id": NumberInt(54),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:31:57.0Z"),
  "created": ISODate("2016-03-17T09:31:57.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea798d5f66fb24150004cc"),
  "auto_id": NumberInt(559),
  "user_id": NumberInt(54),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:31:57.0Z"),
  "created": ISODate("2016-03-17T09:31:57.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea798d5f66fb24150004d7"),
  "auto_id": NumberInt(560),
  "user_id": NumberInt(55),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:31:57.0Z"),
  "created": ISODate("2016-03-17T09:31:57.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea798d5f66fb24150004d8"),
  "auto_id": NumberInt(561),
  "user_id": NumberInt(55),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:31:57.0Z"),
  "created": ISODate("2016-03-17T09:31:57.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea798e5f66fb24150004e3"),
  "auto_id": NumberInt(562),
  "user_id": NumberInt(56),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:31:58.0Z"),
  "created": ISODate("2016-03-17T09:31:58.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea798e5f66fb24150004e4"),
  "auto_id": NumberInt(563),
  "user_id": NumberInt(56),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:31:58.0Z"),
  "created": ISODate("2016-03-17T09:31:58.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea798e5f66fb24150004ef"),
  "auto_id": NumberInt(564),
  "user_id": NumberInt(57),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:31:58.0Z"),
  "created": ISODate("2016-03-17T09:31:58.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea798e5f66fb24150004f0"),
  "auto_id": NumberInt(565),
  "user_id": NumberInt(57),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:31:58.0Z"),
  "created": ISODate("2016-03-17T09:31:58.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea798e5f66fb24150004fb"),
  "auto_id": NumberInt(566),
  "user_id": NumberInt(58),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:31:58.0Z"),
  "created": ISODate("2016-03-17T09:31:58.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea798e5f66fb24150004fc"),
  "auto_id": NumberInt(567),
  "user_id": NumberInt(58),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:31:58.0Z"),
  "created": ISODate("2016-03-17T09:31:58.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea798e5f66fb2415000507"),
  "auto_id": NumberInt(568),
  "user_id": NumberInt(59),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:31:58.0Z"),
  "created": ISODate("2016-03-17T09:31:58.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea798e5f66fb2415000508"),
  "auto_id": NumberInt(569),
  "user_id": NumberInt(59),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:31:58.0Z"),
  "created": ISODate("2016-03-17T09:31:58.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea798e5f66fb2415000513"),
  "auto_id": NumberInt(570),
  "user_id": NumberInt(60),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:31:58.0Z"),
  "created": ISODate("2016-03-17T09:31:58.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea798e5f66fb2415000514"),
  "auto_id": NumberInt(571),
  "user_id": NumberInt(60),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:31:58.0Z"),
  "created": ISODate("2016-03-17T09:31:58.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea798e5f66fb241500051f"),
  "auto_id": NumberInt(572),
  "user_id": NumberInt(61),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:31:58.0Z"),
  "created": ISODate("2016-03-17T09:31:58.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea798e5f66fb2415000520"),
  "auto_id": NumberInt(573),
  "user_id": NumberInt(61),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:31:58.0Z"),
  "created": ISODate("2016-03-17T09:31:58.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea798e5f66fb241500052b"),
  "auto_id": NumberInt(574),
  "user_id": NumberInt(62),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:31:58.0Z"),
  "created": ISODate("2016-03-17T09:31:58.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea798e5f66fb241500052c"),
  "auto_id": NumberInt(575),
  "user_id": NumberInt(62),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:31:58.0Z"),
  "created": ISODate("2016-03-17T09:31:58.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea798f5f66fb2415000537"),
  "auto_id": NumberInt(576),
  "user_id": NumberInt(63),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:31:59.0Z"),
  "created": ISODate("2016-03-17T09:31:59.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea798f5f66fb2415000538"),
  "auto_id": NumberInt(577),
  "user_id": NumberInt(63),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:31:59.0Z"),
  "created": ISODate("2016-03-17T09:31:59.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea798f5f66fb2415000543"),
  "auto_id": NumberInt(578),
  "user_id": NumberInt(64),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:31:59.0Z"),
  "created": ISODate("2016-03-17T09:31:59.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea798f5f66fb2415000544"),
  "auto_id": NumberInt(579),
  "user_id": NumberInt(64),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:31:59.0Z"),
  "created": ISODate("2016-03-17T09:31:59.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea798f5f66fb241500054f"),
  "auto_id": NumberInt(580),
  "user_id": NumberInt(65),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:31:59.0Z"),
  "created": ISODate("2016-03-17T09:31:59.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea798f5f66fb2415000550"),
  "auto_id": NumberInt(581),
  "user_id": NumberInt(65),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:31:59.0Z"),
  "created": ISODate("2016-03-17T09:31:59.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea798f5f66fb241500055b"),
  "auto_id": NumberInt(582),
  "user_id": NumberInt(66),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:31:59.0Z"),
  "created": ISODate("2016-03-17T09:31:59.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea798f5f66fb241500055c"),
  "auto_id": NumberInt(583),
  "user_id": NumberInt(66),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:31:59.0Z"),
  "created": ISODate("2016-03-17T09:31:59.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea798f5f66fb2415000567"),
  "auto_id": NumberInt(584),
  "user_id": NumberInt(67),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:31:59.0Z"),
  "created": ISODate("2016-03-17T09:31:59.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea798f5f66fb2415000568"),
  "auto_id": NumberInt(585),
  "user_id": NumberInt(67),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:31:59.0Z"),
  "created": ISODate("2016-03-17T09:31:59.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea798f5f66fb2415000573"),
  "auto_id": NumberInt(586),
  "user_id": NumberInt(68),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:31:59.0Z"),
  "created": ISODate("2016-03-17T09:31:59.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea798f5f66fb2415000574"),
  "auto_id": NumberInt(587),
  "user_id": NumberInt(68),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:31:59.0Z"),
  "created": ISODate("2016-03-17T09:31:59.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79905f66fb241500057f"),
  "auto_id": NumberInt(588),
  "user_id": NumberInt(69),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:32:00.0Z"),
  "created": ISODate("2016-03-17T09:32:00.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79905f66fb2415000580"),
  "auto_id": NumberInt(589),
  "user_id": NumberInt(69),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:32:00.0Z"),
  "created": ISODate("2016-03-17T09:32:00.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79905f66fb241500058b"),
  "auto_id": NumberInt(590),
  "user_id": NumberInt(70),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:32:00.0Z"),
  "created": ISODate("2016-03-17T09:32:00.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79905f66fb241500058c"),
  "auto_id": NumberInt(591),
  "user_id": NumberInt(70),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:32:00.0Z"),
  "created": ISODate("2016-03-17T09:32:00.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79905f66fb2415000597"),
  "auto_id": NumberInt(592),
  "user_id": NumberInt(71),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:32:00.0Z"),
  "created": ISODate("2016-03-17T09:32:00.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79905f66fb2415000598"),
  "auto_id": NumberInt(593),
  "user_id": NumberInt(71),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:32:00.0Z"),
  "created": ISODate("2016-03-17T09:32:00.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79905f66fb24150005a3"),
  "auto_id": NumberInt(594),
  "user_id": NumberInt(72),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:32:00.0Z"),
  "created": ISODate("2016-03-17T09:32:00.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79905f66fb24150005a4"),
  "auto_id": NumberInt(595),
  "user_id": NumberInt(72),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:32:00.0Z"),
  "created": ISODate("2016-03-17T09:32:00.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79915f66fb24150005af"),
  "auto_id": NumberInt(596),
  "user_id": NumberInt(73),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:32:00.0Z"),
  "created": ISODate("2016-03-17T09:32:00.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79915f66fb24150005b0"),
  "auto_id": NumberInt(597),
  "user_id": NumberInt(73),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:32:01.0Z"),
  "created": ISODate("2016-03-17T09:32:01.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79915f66fb24150005bb"),
  "auto_id": NumberInt(598),
  "user_id": NumberInt(74),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:32:01.0Z"),
  "created": ISODate("2016-03-17T09:32:01.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79915f66fb24150005bc"),
  "auto_id": NumberInt(599),
  "user_id": NumberInt(74),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:32:01.0Z"),
  "created": ISODate("2016-03-17T09:32:01.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79915f66fb24150005c7"),
  "auto_id": NumberInt(600),
  "user_id": NumberInt(75),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:32:01.0Z"),
  "created": ISODate("2016-03-17T09:32:01.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79915f66fb24150005c8"),
  "auto_id": NumberInt(601),
  "user_id": NumberInt(75),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:32:01.0Z"),
  "created": ISODate("2016-03-17T09:32:01.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79915f66fb24150005d3"),
  "auto_id": NumberInt(602),
  "user_id": NumberInt(76),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:32:01.0Z"),
  "created": ISODate("2016-03-17T09:32:01.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79915f66fb24150005d4"),
  "auto_id": NumberInt(603),
  "user_id": NumberInt(76),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:32:01.0Z"),
  "created": ISODate("2016-03-17T09:32:01.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79915f66fb24150005df"),
  "auto_id": NumberInt(604),
  "user_id": NumberInt(77),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:32:01.0Z"),
  "created": ISODate("2016-03-17T09:32:01.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79915f66fb24150005e0"),
  "auto_id": NumberInt(605),
  "user_id": NumberInt(77),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:32:01.0Z"),
  "created": ISODate("2016-03-17T09:32:01.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79915f66fb24150005eb"),
  "auto_id": NumberInt(606),
  "user_id": NumberInt(78),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:32:01.0Z"),
  "created": ISODate("2016-03-17T09:32:01.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79915f66fb24150005ec"),
  "auto_id": NumberInt(607),
  "user_id": NumberInt(78),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:32:01.0Z"),
  "created": ISODate("2016-03-17T09:32:01.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79915f66fb24150005f7"),
  "auto_id": NumberInt(608),
  "user_id": NumberInt(79),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:32:01.0Z"),
  "created": ISODate("2016-03-17T09:32:01.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79915f66fb24150005f8"),
  "auto_id": NumberInt(609),
  "user_id": NumberInt(79),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:32:01.0Z"),
  "created": ISODate("2016-03-17T09:32:01.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79915f66fb2415000603"),
  "auto_id": NumberInt(610),
  "user_id": NumberInt(80),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:32:01.0Z"),
  "created": ISODate("2016-03-17T09:32:01.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79915f66fb2415000604"),
  "auto_id": NumberInt(611),
  "user_id": NumberInt(80),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:32:01.0Z"),
  "created": ISODate("2016-03-17T09:32:01.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79925f66fb241500060f"),
  "auto_id": NumberInt(612),
  "user_id": NumberInt(81),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:32:02.0Z"),
  "created": ISODate("2016-03-17T09:32:02.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79925f66fb2415000610"),
  "auto_id": NumberInt(613),
  "user_id": NumberInt(81),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:32:02.0Z"),
  "created": ISODate("2016-03-17T09:32:02.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79925f66fb241500061b"),
  "auto_id": NumberInt(614),
  "user_id": NumberInt(82),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:32:02.0Z"),
  "created": ISODate("2016-03-17T09:32:02.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79925f66fb241500061c"),
  "auto_id": NumberInt(615),
  "user_id": NumberInt(82),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:32:02.0Z"),
  "created": ISODate("2016-03-17T09:32:02.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79925f66fb2415000627"),
  "auto_id": NumberInt(616),
  "user_id": NumberInt(83),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:32:02.0Z"),
  "created": ISODate("2016-03-17T09:32:02.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79925f66fb2415000628"),
  "auto_id": NumberInt(617),
  "user_id": NumberInt(83),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:32:02.0Z"),
  "created": ISODate("2016-03-17T09:32:02.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79925f66fb2415000633"),
  "auto_id": NumberInt(618),
  "user_id": NumberInt(84),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:32:02.0Z"),
  "created": ISODate("2016-03-17T09:32:02.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79925f66fb2415000634"),
  "auto_id": NumberInt(619),
  "user_id": NumberInt(84),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:32:02.0Z"),
  "created": ISODate("2016-03-17T09:32:02.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79925f66fb241500063f"),
  "auto_id": NumberInt(620),
  "user_id": NumberInt(85),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:32:02.0Z"),
  "created": ISODate("2016-03-17T09:32:02.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79925f66fb2415000640"),
  "auto_id": NumberInt(621),
  "user_id": NumberInt(85),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:32:02.0Z"),
  "created": ISODate("2016-03-17T09:32:02.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79935f66fb241500064b"),
  "auto_id": NumberInt(622),
  "user_id": NumberInt(86),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:32:03.0Z"),
  "created": ISODate("2016-03-17T09:32:03.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79935f66fb241500064c"),
  "auto_id": NumberInt(623),
  "user_id": NumberInt(86),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:32:03.0Z"),
  "created": ISODate("2016-03-17T09:32:03.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79935f66fb2415000657"),
  "auto_id": NumberInt(624),
  "user_id": NumberInt(87),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:32:03.0Z"),
  "created": ISODate("2016-03-17T09:32:03.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79935f66fb2415000658"),
  "auto_id": NumberInt(625),
  "user_id": NumberInt(87),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:32:03.0Z"),
  "created": ISODate("2016-03-17T09:32:03.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79935f66fb2415000663"),
  "auto_id": NumberInt(626),
  "user_id": NumberInt(88),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:32:03.0Z"),
  "created": ISODate("2016-03-17T09:32:03.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79935f66fb2415000664"),
  "auto_id": NumberInt(627),
  "user_id": NumberInt(88),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:32:03.0Z"),
  "created": ISODate("2016-03-17T09:32:03.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79935f66fb241500066f"),
  "auto_id": NumberInt(628),
  "user_id": NumberInt(89),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:32:03.0Z"),
  "created": ISODate("2016-03-17T09:32:03.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79935f66fb2415000670"),
  "auto_id": NumberInt(629),
  "user_id": NumberInt(89),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:32:03.0Z"),
  "created": ISODate("2016-03-17T09:32:03.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79935f66fb241500067b"),
  "auto_id": NumberInt(630),
  "user_id": NumberInt(90),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:32:03.0Z"),
  "created": ISODate("2016-03-17T09:32:03.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79935f66fb241500067c"),
  "auto_id": NumberInt(631),
  "user_id": NumberInt(90),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:32:03.0Z"),
  "created": ISODate("2016-03-17T09:32:03.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79935f66fb2415000687"),
  "auto_id": NumberInt(632),
  "user_id": NumberInt(91),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:32:03.0Z"),
  "created": ISODate("2016-03-17T09:32:03.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79935f66fb2415000688"),
  "auto_id": NumberInt(633),
  "user_id": NumberInt(91),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:32:03.0Z"),
  "created": ISODate("2016-03-17T09:32:03.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79935f66fb2415000693"),
  "auto_id": NumberInt(634),
  "user_id": NumberInt(92),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:32:03.0Z"),
  "created": ISODate("2016-03-17T09:32:03.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79935f66fb2415000694"),
  "auto_id": NumberInt(635),
  "user_id": NumberInt(92),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:32:03.0Z"),
  "created": ISODate("2016-03-17T09:32:03.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79945f66fb241500069f"),
  "auto_id": NumberInt(636),
  "user_id": NumberInt(93),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:32:04.0Z"),
  "created": ISODate("2016-03-17T09:32:04.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79945f66fb24150006a0"),
  "auto_id": NumberInt(637),
  "user_id": NumberInt(93),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:32:04.0Z"),
  "created": ISODate("2016-03-17T09:32:04.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79945f66fb24150006ab"),
  "auto_id": NumberInt(638),
  "user_id": NumberInt(94),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:32:04.0Z"),
  "created": ISODate("2016-03-17T09:32:04.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79945f66fb24150006ac"),
  "auto_id": NumberInt(639),
  "user_id": NumberInt(94),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:32:04.0Z"),
  "created": ISODate("2016-03-17T09:32:04.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79945f66fb24150006b7"),
  "auto_id": NumberInt(640),
  "user_id": NumberInt(95),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:32:04.0Z"),
  "created": ISODate("2016-03-17T09:32:04.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79945f66fb24150006b8"),
  "auto_id": NumberInt(641),
  "user_id": NumberInt(95),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:32:04.0Z"),
  "created": ISODate("2016-03-17T09:32:04.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79945f66fb24150006c3"),
  "auto_id": NumberInt(642),
  "user_id": NumberInt(96),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:32:04.0Z"),
  "created": ISODate("2016-03-17T09:32:04.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79945f66fb24150006c4"),
  "auto_id": NumberInt(643),
  "user_id": NumberInt(96),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:32:04.0Z"),
  "created": ISODate("2016-03-17T09:32:04.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79945f66fb24150006cf"),
  "auto_id": NumberInt(644),
  "user_id": NumberInt(97),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:32:04.0Z"),
  "created": ISODate("2016-03-17T09:32:04.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79945f66fb24150006d0"),
  "auto_id": NumberInt(645),
  "user_id": NumberInt(97),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:32:04.0Z"),
  "created": ISODate("2016-03-17T09:32:04.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79955f66fb24150006db"),
  "auto_id": NumberInt(646),
  "user_id": NumberInt(98),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:32:05.0Z"),
  "created": ISODate("2016-03-17T09:32:05.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79955f66fb24150006dc"),
  "auto_id": NumberInt(647),
  "user_id": NumberInt(98),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:32:05.0Z"),
  "created": ISODate("2016-03-17T09:32:05.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79955f66fb24150006e7"),
  "auto_id": NumberInt(648),
  "user_id": NumberInt(99),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:32:05.0Z"),
  "created": ISODate("2016-03-17T09:32:05.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79955f66fb24150006e8"),
  "auto_id": NumberInt(649),
  "user_id": NumberInt(99),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:32:05.0Z"),
  "created": ISODate("2016-03-17T09:32:05.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79955f66fb24150006f3"),
  "auto_id": NumberInt(650),
  "user_id": NumberInt(100),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:32:05.0Z"),
  "created": ISODate("2016-03-17T09:32:05.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79955f66fb24150006f4"),
  "auto_id": NumberInt(651),
  "user_id": NumberInt(100),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:32:05.0Z"),
  "created": ISODate("2016-03-17T09:32:05.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79955f66fb24150006ff"),
  "auto_id": NumberInt(652),
  "user_id": NumberInt(101),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:32:05.0Z"),
  "created": ISODate("2016-03-17T09:32:05.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79955f66fb2415000700"),
  "auto_id": NumberInt(653),
  "user_id": NumberInt(101),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:32:05.0Z"),
  "created": ISODate("2016-03-17T09:32:05.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79955f66fb241500070b"),
  "auto_id": NumberInt(654),
  "user_id": NumberInt(102),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:32:05.0Z"),
  "created": ISODate("2016-03-17T09:32:05.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79955f66fb241500070c"),
  "auto_id": NumberInt(655),
  "user_id": NumberInt(102),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:32:05.0Z"),
  "created": ISODate("2016-03-17T09:32:05.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79965f66fb2415000717"),
  "auto_id": NumberInt(656),
  "user_id": NumberInt(103),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:32:06.0Z"),
  "created": ISODate("2016-03-17T09:32:06.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79965f66fb2415000718"),
  "auto_id": NumberInt(657),
  "user_id": NumberInt(103),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:32:06.0Z"),
  "created": ISODate("2016-03-17T09:32:06.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79965f66fb2415000723"),
  "auto_id": NumberInt(658),
  "user_id": NumberInt(104),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:32:06.0Z"),
  "created": ISODate("2016-03-17T09:32:06.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79965f66fb2415000724"),
  "auto_id": NumberInt(659),
  "user_id": NumberInt(104),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:32:06.0Z"),
  "created": ISODate("2016-03-17T09:32:06.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79965f66fb241500072f"),
  "auto_id": NumberInt(660),
  "user_id": NumberInt(105),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:32:06.0Z"),
  "created": ISODate("2016-03-17T09:32:06.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79965f66fb2415000730"),
  "auto_id": NumberInt(661),
  "user_id": NumberInt(105),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:32:06.0Z"),
  "created": ISODate("2016-03-17T09:32:06.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79965f66fb241500073b"),
  "auto_id": NumberInt(662),
  "user_id": NumberInt(106),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:32:06.0Z"),
  "created": ISODate("2016-03-17T09:32:06.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79965f66fb241500073c"),
  "auto_id": NumberInt(663),
  "user_id": NumberInt(106),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:32:06.0Z"),
  "created": ISODate("2016-03-17T09:32:06.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79965f66fb2415000747"),
  "auto_id": NumberInt(664),
  "user_id": NumberInt(107),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:32:06.0Z"),
  "created": ISODate("2016-03-17T09:32:06.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79965f66fb2415000748"),
  "auto_id": NumberInt(665),
  "user_id": NumberInt(107),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:32:06.0Z"),
  "created": ISODate("2016-03-17T09:32:06.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79965f66fb2415000753"),
  "auto_id": NumberInt(666),
  "user_id": NumberInt(108),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:32:06.0Z"),
  "created": ISODate("2016-03-17T09:32:06.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79965f66fb2415000754"),
  "auto_id": NumberInt(667),
  "user_id": NumberInt(108),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:32:06.0Z"),
  "created": ISODate("2016-03-17T09:32:06.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79965f66fb241500075f"),
  "auto_id": NumberInt(668),
  "user_id": NumberInt(109),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:32:06.0Z"),
  "created": ISODate("2016-03-17T09:32:06.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79965f66fb2415000760"),
  "auto_id": NumberInt(669),
  "user_id": NumberInt(109),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:32:06.0Z"),
  "created": ISODate("2016-03-17T09:32:06.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79965f66fb241500076b"),
  "auto_id": NumberInt(670),
  "user_id": NumberInt(110),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:32:06.0Z"),
  "created": ISODate("2016-03-17T09:32:06.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79975f66fb241500076c"),
  "auto_id": NumberInt(671),
  "user_id": NumberInt(110),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:32:07.0Z"),
  "created": ISODate("2016-03-17T09:32:07.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79975f66fb2415000777"),
  "auto_id": NumberInt(672),
  "user_id": NumberInt(111),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:32:07.0Z"),
  "created": ISODate("2016-03-17T09:32:07.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79975f66fb2415000778"),
  "auto_id": NumberInt(673),
  "user_id": NumberInt(111),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:32:07.0Z"),
  "created": ISODate("2016-03-17T09:32:07.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79975f66fb2415000783"),
  "auto_id": NumberInt(674),
  "user_id": NumberInt(112),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:32:07.0Z"),
  "created": ISODate("2016-03-17T09:32:07.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79975f66fb2415000784"),
  "auto_id": NumberInt(675),
  "user_id": NumberInt(112),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:32:07.0Z"),
  "created": ISODate("2016-03-17T09:32:07.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79975f66fb241500078f"),
  "auto_id": NumberInt(676),
  "user_id": NumberInt(113),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:32:07.0Z"),
  "created": ISODate("2016-03-17T09:32:07.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79975f66fb2415000790"),
  "auto_id": NumberInt(677),
  "user_id": NumberInt(113),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:32:07.0Z"),
  "created": ISODate("2016-03-17T09:32:07.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79975f66fb241500079b"),
  "auto_id": NumberInt(678),
  "user_id": NumberInt(114),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:32:07.0Z"),
  "created": ISODate("2016-03-17T09:32:07.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79975f66fb241500079c"),
  "auto_id": NumberInt(679),
  "user_id": NumberInt(114),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:32:07.0Z"),
  "created": ISODate("2016-03-17T09:32:07.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79985f66fb24150007a7"),
  "auto_id": NumberInt(680),
  "user_id": NumberInt(115),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:32:08.0Z"),
  "created": ISODate("2016-03-17T09:32:08.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79985f66fb24150007a8"),
  "auto_id": NumberInt(681),
  "user_id": NumberInt(115),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:32:08.0Z"),
  "created": ISODate("2016-03-17T09:32:08.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79985f66fb24150007b3"),
  "auto_id": NumberInt(682),
  "user_id": NumberInt(116),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:32:08.0Z"),
  "created": ISODate("2016-03-17T09:32:08.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79985f66fb24150007b4"),
  "auto_id": NumberInt(683),
  "user_id": NumberInt(116),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:32:08.0Z"),
  "created": ISODate("2016-03-17T09:32:08.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79985f66fb24150007bf"),
  "auto_id": NumberInt(684),
  "user_id": NumberInt(117),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:32:08.0Z"),
  "created": ISODate("2016-03-17T09:32:08.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79985f66fb24150007c0"),
  "auto_id": NumberInt(685),
  "user_id": NumberInt(117),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:32:08.0Z"),
  "created": ISODate("2016-03-17T09:32:08.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79985f66fb24150007cb"),
  "auto_id": NumberInt(686),
  "user_id": NumberInt(118),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:32:08.0Z"),
  "created": ISODate("2016-03-17T09:32:08.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79985f66fb24150007cc"),
  "auto_id": NumberInt(687),
  "user_id": NumberInt(118),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:32:08.0Z"),
  "created": ISODate("2016-03-17T09:32:08.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79985f66fb24150007d7"),
  "auto_id": NumberInt(688),
  "user_id": NumberInt(119),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:32:08.0Z"),
  "created": ISODate("2016-03-17T09:32:08.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79985f66fb24150007d8"),
  "auto_id": NumberInt(689),
  "user_id": NumberInt(119),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:32:08.0Z"),
  "created": ISODate("2016-03-17T09:32:08.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79985f66fb24150007e3"),
  "auto_id": NumberInt(690),
  "user_id": NumberInt(120),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:32:08.0Z"),
  "created": ISODate("2016-03-17T09:32:08.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79985f66fb24150007e4"),
  "auto_id": NumberInt(691),
  "user_id": NumberInt(120),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:32:08.0Z"),
  "created": ISODate("2016-03-17T09:32:08.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79985f66fb24150007ef"),
  "auto_id": NumberInt(692),
  "user_id": NumberInt(121),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:32:08.0Z"),
  "created": ISODate("2016-03-17T09:32:08.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79985f66fb24150007f0"),
  "auto_id": NumberInt(693),
  "user_id": NumberInt(121),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:32:08.0Z"),
  "created": ISODate("2016-03-17T09:32:08.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79995f66fb24150007fb"),
  "auto_id": NumberInt(694),
  "user_id": NumberInt(122),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:32:09.0Z"),
  "created": ISODate("2016-03-17T09:32:09.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79995f66fb24150007fc"),
  "auto_id": NumberInt(695),
  "user_id": NumberInt(122),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:32:09.0Z"),
  "created": ISODate("2016-03-17T09:32:09.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79995f66fb2415000807"),
  "auto_id": NumberInt(696),
  "user_id": NumberInt(123),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:32:09.0Z"),
  "created": ISODate("2016-03-17T09:32:09.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79995f66fb2415000808"),
  "auto_id": NumberInt(697),
  "user_id": NumberInt(123),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:32:09.0Z"),
  "created": ISODate("2016-03-17T09:32:09.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79995f66fb2415000813"),
  "auto_id": NumberInt(698),
  "user_id": NumberInt(124),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:32:09.0Z"),
  "created": ISODate("2016-03-17T09:32:09.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79995f66fb2415000814"),
  "auto_id": NumberInt(699),
  "user_id": NumberInt(124),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:32:09.0Z"),
  "created": ISODate("2016-03-17T09:32:09.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79995f66fb241500081f"),
  "auto_id": NumberInt(700),
  "user_id": NumberInt(125),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:32:09.0Z"),
  "created": ISODate("2016-03-17T09:32:09.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79995f66fb2415000820"),
  "auto_id": NumberInt(701),
  "user_id": NumberInt(125),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:32:09.0Z"),
  "created": ISODate("2016-03-17T09:32:09.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79995f66fb241500082b"),
  "auto_id": NumberInt(702),
  "user_id": NumberInt(126),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:32:09.0Z"),
  "created": ISODate("2016-03-17T09:32:09.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79995f66fb241500082c"),
  "auto_id": NumberInt(703),
  "user_id": NumberInt(126),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:32:09.0Z"),
  "created": ISODate("2016-03-17T09:32:09.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea799a5f66fb2415000837"),
  "auto_id": NumberInt(704),
  "user_id": NumberInt(127),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:32:10.0Z"),
  "created": ISODate("2016-03-17T09:32:10.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea799a5f66fb2415000838"),
  "auto_id": NumberInt(705),
  "user_id": NumberInt(127),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:32:10.0Z"),
  "created": ISODate("2016-03-17T09:32:10.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea799a5f66fb2415000843"),
  "auto_id": NumberInt(706),
  "user_id": NumberInt(128),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:32:10.0Z"),
  "created": ISODate("2016-03-17T09:32:10.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea799a5f66fb2415000844"),
  "auto_id": NumberInt(707),
  "user_id": NumberInt(128),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:32:10.0Z"),
  "created": ISODate("2016-03-17T09:32:10.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea799a5f66fb241500084f"),
  "auto_id": NumberInt(708),
  "user_id": NumberInt(129),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:32:10.0Z"),
  "created": ISODate("2016-03-17T09:32:10.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea799a5f66fb2415000850"),
  "auto_id": NumberInt(709),
  "user_id": NumberInt(129),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:32:10.0Z"),
  "created": ISODate("2016-03-17T09:32:10.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea799a5f66fb241500085b"),
  "auto_id": NumberInt(710),
  "user_id": NumberInt(130),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:32:10.0Z"),
  "created": ISODate("2016-03-17T09:32:10.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea799a5f66fb241500085c"),
  "auto_id": NumberInt(711),
  "user_id": NumberInt(130),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:32:10.0Z"),
  "created": ISODate("2016-03-17T09:32:10.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea799a5f66fb2415000867"),
  "auto_id": NumberInt(712),
  "user_id": NumberInt(131),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:32:10.0Z"),
  "created": ISODate("2016-03-17T09:32:10.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea799a5f66fb2415000868"),
  "auto_id": NumberInt(713),
  "user_id": NumberInt(131),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:32:10.0Z"),
  "created": ISODate("2016-03-17T09:32:10.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea799a5f66fb2415000873"),
  "auto_id": NumberInt(714),
  "user_id": NumberInt(132),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:32:10.0Z"),
  "created": ISODate("2016-03-17T09:32:10.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea799a5f66fb2415000874"),
  "auto_id": NumberInt(715),
  "user_id": NumberInt(132),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:32:10.0Z"),
  "created": ISODate("2016-03-17T09:32:10.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea799b5f66fb241500087f"),
  "auto_id": NumberInt(716),
  "user_id": NumberInt(133),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:32:11.0Z"),
  "created": ISODate("2016-03-17T09:32:11.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea799b5f66fb2415000880"),
  "auto_id": NumberInt(717),
  "user_id": NumberInt(133),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:32:11.0Z"),
  "created": ISODate("2016-03-17T09:32:11.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea799b5f66fb241500088b"),
  "auto_id": NumberInt(718),
  "user_id": NumberInt(134),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:32:11.0Z"),
  "created": ISODate("2016-03-17T09:32:11.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea799b5f66fb241500088c"),
  "auto_id": NumberInt(719),
  "user_id": NumberInt(134),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:32:11.0Z"),
  "created": ISODate("2016-03-17T09:32:11.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea799c5f66fb2415000897"),
  "auto_id": NumberInt(720),
  "user_id": NumberInt(135),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:32:12.0Z"),
  "created": ISODate("2016-03-17T09:32:12.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea799c5f66fb2415000898"),
  "auto_id": NumberInt(721),
  "user_id": NumberInt(135),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:32:12.0Z"),
  "created": ISODate("2016-03-17T09:32:12.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea799c5f66fb24150008a3"),
  "auto_id": NumberInt(722),
  "user_id": NumberInt(136),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:32:12.0Z"),
  "created": ISODate("2016-03-17T09:32:12.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea799c5f66fb24150008a4"),
  "auto_id": NumberInt(723),
  "user_id": NumberInt(136),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:32:12.0Z"),
  "created": ISODate("2016-03-17T09:32:12.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea799c5f66fb24150008af"),
  "auto_id": NumberInt(724),
  "user_id": NumberInt(137),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:32:12.0Z"),
  "created": ISODate("2016-03-17T09:32:12.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea799c5f66fb24150008b0"),
  "auto_id": NumberInt(725),
  "user_id": NumberInt(137),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:32:12.0Z"),
  "created": ISODate("2016-03-17T09:32:12.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea799c5f66fb24150008bb"),
  "auto_id": NumberInt(726),
  "user_id": NumberInt(138),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:32:12.0Z"),
  "created": ISODate("2016-03-17T09:32:12.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea799c5f66fb24150008bc"),
  "auto_id": NumberInt(727),
  "user_id": NumberInt(138),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:32:12.0Z"),
  "created": ISODate("2016-03-17T09:32:12.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea799c5f66fb24150008c7"),
  "auto_id": NumberInt(728),
  "user_id": NumberInt(139),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:32:12.0Z"),
  "created": ISODate("2016-03-17T09:32:12.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea799c5f66fb24150008c8"),
  "auto_id": NumberInt(729),
  "user_id": NumberInt(139),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:32:12.0Z"),
  "created": ISODate("2016-03-17T09:32:12.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea799c5f66fb24150008d3"),
  "auto_id": NumberInt(730),
  "user_id": NumberInt(140),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:32:12.0Z"),
  "created": ISODate("2016-03-17T09:32:12.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea799c5f66fb24150008d4"),
  "auto_id": NumberInt(731),
  "user_id": NumberInt(140),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:32:12.0Z"),
  "created": ISODate("2016-03-17T09:32:12.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea799c5f66fb24150008df"),
  "auto_id": NumberInt(732),
  "user_id": NumberInt(141),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:32:12.0Z"),
  "created": ISODate("2016-03-17T09:32:12.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea799c5f66fb24150008e0"),
  "auto_id": NumberInt(733),
  "user_id": NumberInt(141),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:32:12.0Z"),
  "created": ISODate("2016-03-17T09:32:12.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea799d5f66fb24150008eb"),
  "auto_id": NumberInt(734),
  "user_id": NumberInt(142),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:32:13.0Z"),
  "created": ISODate("2016-03-17T09:32:13.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea799d5f66fb24150008ec"),
  "auto_id": NumberInt(735),
  "user_id": NumberInt(142),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:32:13.0Z"),
  "created": ISODate("2016-03-17T09:32:13.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea799d5f66fb24150008f7"),
  "auto_id": NumberInt(736),
  "user_id": NumberInt(143),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:32:13.0Z"),
  "created": ISODate("2016-03-17T09:32:13.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea799d5f66fb24150008f8"),
  "auto_id": NumberInt(737),
  "user_id": NumberInt(143),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:32:13.0Z"),
  "created": ISODate("2016-03-17T09:32:13.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea799d5f66fb2415000903"),
  "auto_id": NumberInt(738),
  "user_id": NumberInt(144),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:32:13.0Z"),
  "created": ISODate("2016-03-17T09:32:13.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea799d5f66fb2415000904"),
  "auto_id": NumberInt(739),
  "user_id": NumberInt(144),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:32:13.0Z"),
  "created": ISODate("2016-03-17T09:32:13.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea799d5f66fb241500090f"),
  "auto_id": NumberInt(740),
  "user_id": NumberInt(145),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:32:13.0Z"),
  "created": ISODate("2016-03-17T09:32:13.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea799d5f66fb2415000910"),
  "auto_id": NumberInt(741),
  "user_id": NumberInt(145),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:32:13.0Z"),
  "created": ISODate("2016-03-17T09:32:13.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea799d5f66fb241500091b"),
  "auto_id": NumberInt(742),
  "user_id": NumberInt(146),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:32:13.0Z"),
  "created": ISODate("2016-03-17T09:32:13.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea799d5f66fb241500091c"),
  "auto_id": NumberInt(743),
  "user_id": NumberInt(146),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:32:13.0Z"),
  "created": ISODate("2016-03-17T09:32:13.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea799e5f66fb2415000927"),
  "auto_id": NumberInt(744),
  "user_id": NumberInt(147),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:32:14.0Z"),
  "created": ISODate("2016-03-17T09:32:14.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea799e5f66fb2415000928"),
  "auto_id": NumberInt(745),
  "user_id": NumberInt(147),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:32:14.0Z"),
  "created": ISODate("2016-03-17T09:32:14.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea799e5f66fb2415000933"),
  "auto_id": NumberInt(746),
  "user_id": NumberInt(148),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:32:14.0Z"),
  "created": ISODate("2016-03-17T09:32:14.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea799e5f66fb2415000934"),
  "auto_id": NumberInt(747),
  "user_id": NumberInt(148),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:32:14.0Z"),
  "created": ISODate("2016-03-17T09:32:14.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea799e5f66fb241500093f"),
  "auto_id": NumberInt(748),
  "user_id": NumberInt(149),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:32:14.0Z"),
  "created": ISODate("2016-03-17T09:32:14.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea799e5f66fb2415000940"),
  "auto_id": NumberInt(749),
  "user_id": NumberInt(149),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:32:14.0Z"),
  "created": ISODate("2016-03-17T09:32:14.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea799e5f66fb241500094b"),
  "auto_id": NumberInt(750),
  "user_id": NumberInt(150),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:32:14.0Z"),
  "created": ISODate("2016-03-17T09:32:14.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea799e5f66fb241500094c"),
  "auto_id": NumberInt(751),
  "user_id": NumberInt(150),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:32:14.0Z"),
  "created": ISODate("2016-03-17T09:32:14.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea799e5f66fb2415000957"),
  "auto_id": NumberInt(752),
  "user_id": NumberInt(151),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:32:14.0Z"),
  "created": ISODate("2016-03-17T09:32:14.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea799e5f66fb2415000958"),
  "auto_id": NumberInt(753),
  "user_id": NumberInt(151),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:32:14.0Z"),
  "created": ISODate("2016-03-17T09:32:14.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea799e5f66fb2415000963"),
  "auto_id": NumberInt(754),
  "user_id": NumberInt(152),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:32:14.0Z"),
  "created": ISODate("2016-03-17T09:32:14.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea799e5f66fb2415000964"),
  "auto_id": NumberInt(755),
  "user_id": NumberInt(152),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:32:14.0Z"),
  "created": ISODate("2016-03-17T09:32:14.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea799f5f66fb241500096f"),
  "auto_id": NumberInt(756),
  "user_id": NumberInt(153),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:32:15.0Z"),
  "created": ISODate("2016-03-17T09:32:15.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea799f5f66fb2415000970"),
  "auto_id": NumberInt(757),
  "user_id": NumberInt(153),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:32:15.0Z"),
  "created": ISODate("2016-03-17T09:32:15.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea799f5f66fb241500097b"),
  "auto_id": NumberInt(758),
  "user_id": NumberInt(154),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:32:15.0Z"),
  "created": ISODate("2016-03-17T09:32:15.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea799f5f66fb241500097c"),
  "auto_id": NumberInt(759),
  "user_id": NumberInt(154),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:32:15.0Z"),
  "created": ISODate("2016-03-17T09:32:15.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea799f5f66fb2415000987"),
  "auto_id": NumberInt(760),
  "user_id": NumberInt(155),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:32:15.0Z"),
  "created": ISODate("2016-03-17T09:32:15.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea799f5f66fb2415000988"),
  "auto_id": NumberInt(761),
  "user_id": NumberInt(155),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:32:15.0Z"),
  "created": ISODate("2016-03-17T09:32:15.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea799f5f66fb2415000993"),
  "auto_id": NumberInt(762),
  "user_id": NumberInt(156),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:32:15.0Z"),
  "created": ISODate("2016-03-17T09:32:15.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea799f5f66fb2415000994"),
  "auto_id": NumberInt(763),
  "user_id": NumberInt(156),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:32:15.0Z"),
  "created": ISODate("2016-03-17T09:32:15.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea799f5f66fb241500099f"),
  "auto_id": NumberInt(764),
  "user_id": NumberInt(157),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:32:15.0Z"),
  "created": ISODate("2016-03-17T09:32:15.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea799f5f66fb24150009a0"),
  "auto_id": NumberInt(765),
  "user_id": NumberInt(157),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:32:15.0Z"),
  "created": ISODate("2016-03-17T09:32:15.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79a05f66fb24150009ab"),
  "auto_id": NumberInt(766),
  "user_id": NumberInt(158),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:32:16.0Z"),
  "created": ISODate("2016-03-17T09:32:16.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79a05f66fb24150009ac"),
  "auto_id": NumberInt(767),
  "user_id": NumberInt(158),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:32:16.0Z"),
  "created": ISODate("2016-03-17T09:32:16.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79a05f66fb24150009b7"),
  "auto_id": NumberInt(768),
  "user_id": NumberInt(159),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:32:16.0Z"),
  "created": ISODate("2016-03-17T09:32:16.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79a05f66fb24150009b8"),
  "auto_id": NumberInt(769),
  "user_id": NumberInt(159),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:32:16.0Z"),
  "created": ISODate("2016-03-17T09:32:16.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79a05f66fb24150009c3"),
  "auto_id": NumberInt(770),
  "user_id": NumberInt(160),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:32:16.0Z"),
  "created": ISODate("2016-03-17T09:32:16.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79a05f66fb24150009c4"),
  "auto_id": NumberInt(771),
  "user_id": NumberInt(160),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:32:16.0Z"),
  "created": ISODate("2016-03-17T09:32:16.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79a05f66fb24150009cf"),
  "auto_id": NumberInt(772),
  "user_id": NumberInt(161),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:32:16.0Z"),
  "created": ISODate("2016-03-17T09:32:16.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79a05f66fb24150009d0"),
  "auto_id": NumberInt(773),
  "user_id": NumberInt(161),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:32:16.0Z"),
  "created": ISODate("2016-03-17T09:32:16.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79a05f66fb24150009db"),
  "auto_id": NumberInt(774),
  "user_id": NumberInt(162),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:32:16.0Z"),
  "created": ISODate("2016-03-17T09:32:16.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79a05f66fb24150009dc"),
  "auto_id": NumberInt(775),
  "user_id": NumberInt(162),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:32:16.0Z"),
  "created": ISODate("2016-03-17T09:32:16.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79a15f66fb24150009e7"),
  "auto_id": NumberInt(776),
  "user_id": NumberInt(163),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:32:17.0Z"),
  "created": ISODate("2016-03-17T09:32:17.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79a15f66fb24150009e8"),
  "auto_id": NumberInt(777),
  "user_id": NumberInt(163),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:32:17.0Z"),
  "created": ISODate("2016-03-17T09:32:17.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79a15f66fb24150009f3"),
  "auto_id": NumberInt(778),
  "user_id": NumberInt(164),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:32:17.0Z"),
  "created": ISODate("2016-03-17T09:32:17.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79a15f66fb24150009f4"),
  "auto_id": NumberInt(779),
  "user_id": NumberInt(164),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:32:17.0Z"),
  "created": ISODate("2016-03-17T09:32:17.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79a15f66fb24150009ff"),
  "auto_id": NumberInt(780),
  "user_id": NumberInt(165),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:32:17.0Z"),
  "created": ISODate("2016-03-17T09:32:17.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79a15f66fb2415000a00"),
  "auto_id": NumberInt(781),
  "user_id": NumberInt(165),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:32:17.0Z"),
  "created": ISODate("2016-03-17T09:32:17.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79a15f66fb2415000a0b"),
  "auto_id": NumberInt(782),
  "user_id": NumberInt(166),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:32:17.0Z"),
  "created": ISODate("2016-03-17T09:32:17.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79a15f66fb2415000a0c"),
  "auto_id": NumberInt(783),
  "user_id": NumberInt(166),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:32:17.0Z"),
  "created": ISODate("2016-03-17T09:32:17.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79a15f66fb2415000a17"),
  "auto_id": NumberInt(784),
  "user_id": NumberInt(167),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:32:17.0Z"),
  "created": ISODate("2016-03-17T09:32:17.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79a15f66fb2415000a18"),
  "auto_id": NumberInt(785),
  "user_id": NumberInt(167),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:32:17.0Z"),
  "created": ISODate("2016-03-17T09:32:17.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79a15f66fb2415000a23"),
  "auto_id": NumberInt(786),
  "user_id": NumberInt(168),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:32:17.0Z"),
  "created": ISODate("2016-03-17T09:32:17.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79a15f66fb2415000a24"),
  "auto_id": NumberInt(787),
  "user_id": NumberInt(168),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:32:17.0Z"),
  "created": ISODate("2016-03-17T09:32:17.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79a25f66fb2415000a2f"),
  "auto_id": NumberInt(788),
  "user_id": NumberInt(169),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:32:18.0Z"),
  "created": ISODate("2016-03-17T09:32:18.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79a25f66fb2415000a30"),
  "auto_id": NumberInt(789),
  "user_id": NumberInt(169),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:32:18.0Z"),
  "created": ISODate("2016-03-17T09:32:18.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79a25f66fb2415000a3b"),
  "auto_id": NumberInt(790),
  "user_id": NumberInt(170),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:32:18.0Z"),
  "created": ISODate("2016-03-17T09:32:18.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79a25f66fb2415000a3c"),
  "auto_id": NumberInt(791),
  "user_id": NumberInt(170),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:32:18.0Z"),
  "created": ISODate("2016-03-17T09:32:18.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79a25f66fb2415000a47"),
  "auto_id": NumberInt(792),
  "user_id": NumberInt(171),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:32:18.0Z"),
  "created": ISODate("2016-03-17T09:32:18.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79a25f66fb2415000a48"),
  "auto_id": NumberInt(793),
  "user_id": NumberInt(171),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:32:18.0Z"),
  "created": ISODate("2016-03-17T09:32:18.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79a25f66fb2415000a53"),
  "auto_id": NumberInt(794),
  "user_id": NumberInt(172),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:32:18.0Z"),
  "created": ISODate("2016-03-17T09:32:18.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79a25f66fb2415000a54"),
  "auto_id": NumberInt(795),
  "user_id": NumberInt(172),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:32:18.0Z"),
  "created": ISODate("2016-03-17T09:32:18.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79a25f66fb2415000a5f"),
  "auto_id": NumberInt(796),
  "user_id": NumberInt(173),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:32:18.0Z"),
  "created": ISODate("2016-03-17T09:32:18.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79a25f66fb2415000a60"),
  "auto_id": NumberInt(797),
  "user_id": NumberInt(173),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:32:18.0Z"),
  "created": ISODate("2016-03-17T09:32:18.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79a35f66fb2415000a6b"),
  "auto_id": NumberInt(798),
  "user_id": NumberInt(174),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:32:19.0Z"),
  "created": ISODate("2016-03-17T09:32:19.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79a35f66fb2415000a6c"),
  "auto_id": NumberInt(799),
  "user_id": NumberInt(174),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:32:19.0Z"),
  "created": ISODate("2016-03-17T09:32:19.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79a35f66fb2415000a77"),
  "auto_id": NumberInt(800),
  "user_id": NumberInt(175),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:32:19.0Z"),
  "created": ISODate("2016-03-17T09:32:19.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79a35f66fb2415000a78"),
  "auto_id": NumberInt(801),
  "user_id": NumberInt(175),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:32:19.0Z"),
  "created": ISODate("2016-03-17T09:32:19.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79a35f66fb2415000a83"),
  "auto_id": NumberInt(802),
  "user_id": NumberInt(176),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:32:19.0Z"),
  "created": ISODate("2016-03-17T09:32:19.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79a35f66fb2415000a84"),
  "auto_id": NumberInt(803),
  "user_id": NumberInt(176),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:32:19.0Z"),
  "created": ISODate("2016-03-17T09:32:19.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79a35f66fb2415000a8f"),
  "auto_id": NumberInt(804),
  "user_id": NumberInt(177),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:32:19.0Z"),
  "created": ISODate("2016-03-17T09:32:19.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79a35f66fb2415000a90"),
  "auto_id": NumberInt(805),
  "user_id": NumberInt(177),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:32:19.0Z"),
  "created": ISODate("2016-03-17T09:32:19.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79a35f66fb2415000a9b"),
  "auto_id": NumberInt(806),
  "user_id": NumberInt(178),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:32:19.0Z"),
  "created": ISODate("2016-03-17T09:32:19.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79a35f66fb2415000a9c"),
  "auto_id": NumberInt(807),
  "user_id": NumberInt(178),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:32:19.0Z"),
  "created": ISODate("2016-03-17T09:32:19.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79a35f66fb2415000aa7"),
  "auto_id": NumberInt(808),
  "user_id": NumberInt(179),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:32:19.0Z"),
  "created": ISODate("2016-03-17T09:32:19.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79a35f66fb2415000aa8"),
  "auto_id": NumberInt(809),
  "user_id": NumberInt(179),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:32:19.0Z"),
  "created": ISODate("2016-03-17T09:32:19.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79a45f66fb2415000ab3"),
  "auto_id": NumberInt(810),
  "user_id": NumberInt(180),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:32:20.0Z"),
  "created": ISODate("2016-03-17T09:32:20.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79a45f66fb2415000ab4"),
  "auto_id": NumberInt(811),
  "user_id": NumberInt(180),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:32:20.0Z"),
  "created": ISODate("2016-03-17T09:32:20.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79a45f66fb2415000abf"),
  "auto_id": NumberInt(812),
  "user_id": NumberInt(181),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:32:20.0Z"),
  "created": ISODate("2016-03-17T09:32:20.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79a45f66fb2415000ac0"),
  "auto_id": NumberInt(813),
  "user_id": NumberInt(181),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:32:20.0Z"),
  "created": ISODate("2016-03-17T09:32:20.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79a45f66fb2415000acb"),
  "auto_id": NumberInt(814),
  "user_id": NumberInt(182),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:32:20.0Z"),
  "created": ISODate("2016-03-17T09:32:20.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79a45f66fb2415000acc"),
  "auto_id": NumberInt(815),
  "user_id": NumberInt(182),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:32:20.0Z"),
  "created": ISODate("2016-03-17T09:32:20.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79a45f66fb2415000ad7"),
  "auto_id": NumberInt(816),
  "user_id": NumberInt(183),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:32:20.0Z"),
  "created": ISODate("2016-03-17T09:32:20.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79a45f66fb2415000ad8"),
  "auto_id": NumberInt(817),
  "user_id": NumberInt(183),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:32:20.0Z"),
  "created": ISODate("2016-03-17T09:32:20.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79a45f66fb2415000ae3"),
  "auto_id": NumberInt(818),
  "user_id": NumberInt(184),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:32:20.0Z"),
  "created": ISODate("2016-03-17T09:32:20.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79a45f66fb2415000ae4"),
  "auto_id": NumberInt(819),
  "user_id": NumberInt(184),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:32:20.0Z"),
  "created": ISODate("2016-03-17T09:32:20.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79a55f66fb2415000aef"),
  "auto_id": NumberInt(820),
  "user_id": NumberInt(185),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:32:21.0Z"),
  "created": ISODate("2016-03-17T09:32:21.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79a55f66fb2415000af0"),
  "auto_id": NumberInt(821),
  "user_id": NumberInt(185),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:32:21.0Z"),
  "created": ISODate("2016-03-17T09:32:21.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79a55f66fb2415000afb"),
  "auto_id": NumberInt(822),
  "user_id": NumberInt(186),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:32:21.0Z"),
  "created": ISODate("2016-03-17T09:32:21.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79a55f66fb2415000afc"),
  "auto_id": NumberInt(823),
  "user_id": NumberInt(186),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:32:21.0Z"),
  "created": ISODate("2016-03-17T09:32:21.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79a55f66fb2415000b07"),
  "auto_id": NumberInt(824),
  "user_id": NumberInt(187),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:32:21.0Z"),
  "created": ISODate("2016-03-17T09:32:21.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79a55f66fb2415000b08"),
  "auto_id": NumberInt(825),
  "user_id": NumberInt(187),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:32:21.0Z"),
  "created": ISODate("2016-03-17T09:32:21.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79a55f66fb2415000b13"),
  "auto_id": NumberInt(826),
  "user_id": NumberInt(188),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:32:21.0Z"),
  "created": ISODate("2016-03-17T09:32:21.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79a55f66fb2415000b14"),
  "auto_id": NumberInt(827),
  "user_id": NumberInt(188),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:32:21.0Z"),
  "created": ISODate("2016-03-17T09:32:21.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79a55f66fb2415000b1f"),
  "auto_id": NumberInt(828),
  "user_id": NumberInt(189),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:32:21.0Z"),
  "created": ISODate("2016-03-17T09:32:21.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79a55f66fb2415000b20"),
  "auto_id": NumberInt(829),
  "user_id": NumberInt(189),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:32:21.0Z"),
  "created": ISODate("2016-03-17T09:32:21.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79a55f66fb2415000b2b"),
  "auto_id": NumberInt(830),
  "user_id": NumberInt(190),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:32:21.0Z"),
  "created": ISODate("2016-03-17T09:32:21.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79a55f66fb2415000b2c"),
  "auto_id": NumberInt(831),
  "user_id": NumberInt(190),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:32:21.0Z"),
  "created": ISODate("2016-03-17T09:32:21.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79a65f66fb2415000b37"),
  "auto_id": NumberInt(832),
  "user_id": NumberInt(191),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:32:22.0Z"),
  "created": ISODate("2016-03-17T09:32:22.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79a65f66fb2415000b38"),
  "auto_id": NumberInt(833),
  "user_id": NumberInt(191),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:32:22.0Z"),
  "created": ISODate("2016-03-17T09:32:22.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79a65f66fb2415000b43"),
  "auto_id": NumberInt(834),
  "user_id": NumberInt(192),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:32:22.0Z"),
  "created": ISODate("2016-03-17T09:32:22.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79a65f66fb2415000b44"),
  "auto_id": NumberInt(835),
  "user_id": NumberInt(192),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:32:22.0Z"),
  "created": ISODate("2016-03-17T09:32:22.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79a65f66fb2415000b4f"),
  "auto_id": NumberInt(836),
  "user_id": NumberInt(193),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:32:22.0Z"),
  "created": ISODate("2016-03-17T09:32:22.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79a65f66fb2415000b50"),
  "auto_id": NumberInt(837),
  "user_id": NumberInt(193),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:32:22.0Z"),
  "created": ISODate("2016-03-17T09:32:22.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79a65f66fb2415000b5b"),
  "auto_id": NumberInt(838),
  "user_id": NumberInt(194),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:32:22.0Z"),
  "created": ISODate("2016-03-17T09:32:22.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79a65f66fb2415000b5c"),
  "auto_id": NumberInt(839),
  "user_id": NumberInt(194),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:32:22.0Z"),
  "created": ISODate("2016-03-17T09:32:22.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79a75f66fb2415000b67"),
  "auto_id": NumberInt(840),
  "user_id": NumberInt(195),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:32:23.0Z"),
  "created": ISODate("2016-03-17T09:32:23.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79a75f66fb2415000b68"),
  "auto_id": NumberInt(841),
  "user_id": NumberInt(195),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:32:23.0Z"),
  "created": ISODate("2016-03-17T09:32:23.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79a75f66fb2415000b73"),
  "auto_id": NumberInt(842),
  "user_id": NumberInt(196),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:32:23.0Z"),
  "created": ISODate("2016-03-17T09:32:23.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79a75f66fb2415000b74"),
  "auto_id": NumberInt(843),
  "user_id": NumberInt(196),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:32:23.0Z"),
  "created": ISODate("2016-03-17T09:32:23.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79a75f66fb2415000b7f"),
  "auto_id": NumberInt(844),
  "user_id": NumberInt(197),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:32:23.0Z"),
  "created": ISODate("2016-03-17T09:32:23.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79a75f66fb2415000b80"),
  "auto_id": NumberInt(845),
  "user_id": NumberInt(197),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:32:23.0Z"),
  "created": ISODate("2016-03-17T09:32:23.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79a75f66fb2415000b8b"),
  "auto_id": NumberInt(846),
  "user_id": NumberInt(198),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:32:23.0Z"),
  "created": ISODate("2016-03-17T09:32:23.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79a75f66fb2415000b8c"),
  "auto_id": NumberInt(847),
  "user_id": NumberInt(198),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:32:23.0Z"),
  "created": ISODate("2016-03-17T09:32:23.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79a75f66fb2415000b97"),
  "auto_id": NumberInt(848),
  "user_id": NumberInt(199),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:32:23.0Z"),
  "created": ISODate("2016-03-17T09:32:23.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79a75f66fb2415000b98"),
  "auto_id": NumberInt(849),
  "user_id": NumberInt(199),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:32:23.0Z"),
  "created": ISODate("2016-03-17T09:32:23.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79a75f66fb2415000ba3"),
  "auto_id": NumberInt(850),
  "user_id": NumberInt(200),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:32:23.0Z"),
  "created": ISODate("2016-03-17T09:32:23.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79a75f66fb2415000ba4"),
  "auto_id": NumberInt(851),
  "user_id": NumberInt(200),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:32:23.0Z"),
  "created": ISODate("2016-03-17T09:32:23.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79a75f66fb2415000baf"),
  "auto_id": NumberInt(852),
  "user_id": NumberInt(201),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:32:23.0Z"),
  "created": ISODate("2016-03-17T09:32:23.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79a75f66fb2415000bb0"),
  "auto_id": NumberInt(853),
  "user_id": NumberInt(201),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:32:23.0Z"),
  "created": ISODate("2016-03-17T09:32:23.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79a85f66fb2415000bbb"),
  "auto_id": NumberInt(854),
  "user_id": NumberInt(202),
  "role_id": NumberInt(3),
  "default": "yes",
  "modified": ISODate("2016-03-17T09:32:24.0Z"),
  "created": ISODate("2016-03-17T09:32:24.0Z")
});
db.getCollection("user_roles").insert({
  "_id": ObjectId("56ea79a85f66fb2415000bbc"),
  "auto_id": NumberInt(855),
  "user_id": NumberInt(202),
  "role_id": NumberInt(2),
  "modified": ISODate("2016-03-17T09:32:24.0Z"),
  "created": ISODate("2016-03-17T09:32:24.0Z")
});

/** wings records **/
db.getCollection("wings").insert({
  "_id": ObjectId("56ea757c5f66fb241500000a"),
  "wing_id": NumberInt(1),
  "society_id": NumberInt(7),
  "wing_name": "Wing A",
  "modified": ISODate("2016-03-17T09:14:36.0Z"),
  "created": ISODate("2016-03-17T09:14:36.0Z")
});
db.getCollection("wings").insert({
  "_id": ObjectId("56ea75805f66fb241500000b"),
  "wing_id": NumberInt(2),
  "society_id": NumberInt(7),
  "wing_name": "Wing B",
  "modified": ISODate("2016-03-17T09:14:40.0Z"),
  "created": ISODate("2016-03-17T09:14:40.0Z")
});
