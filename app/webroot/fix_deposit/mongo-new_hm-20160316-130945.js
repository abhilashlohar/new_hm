
/** ledger_accounts indexes **/
db.getCollection("ledger_accounts").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** ledger_accounts records **/
db.getCollection("ledger_accounts").insert({
  "_id": ObjectId("53c77f40845a63e40a000016"),
  "auto_id": NumberInt(57),
  "group_id": NumberInt(10),
  "ledger_name": "Power back & generator - R&M",
  "edit_user_id": NumberInt(1),
  "society_id": NumberInt(0),
  "delete_id": NumberInt(0)
});
db.getCollection("ledger_accounts").insert({
  "_id": ObjectId("53c77a26845a63201000000f"),
  "auto_id": NumberInt(16),
  "group_id": NumberInt(3),
  "ledger_name": "Tax deducted at source (TDS payable)",
  "edit_user_id": NumberInt(1),
  "society_id": NumberInt(0),
  "delete_id": NumberInt(0)
});
db.getCollection("ledger_accounts").insert({
  "_id": ObjectId("53c78183845a63e40a000025"),
  "auto_id": NumberInt(72),
  "group_id": NumberInt(11),
  "ledger_name": "Printing & Stationery charges",
  "edit_user_id": NumberInt(1),
  "society_id": NumberInt(0),
  "delete_id": NumberInt(0)
});
db.getCollection("ledger_accounts").insert({
  "_id": ObjectId("53c7814e845a63e40a000021"),
  "auto_id": NumberInt(68),
  "group_id": NumberInt(11),
  "ledger_name": "Insurance charges",
  "edit_user_id": NumberInt(1),
  "society_id": NumberInt(0),
  "delete_id": NumberInt(0)
});
db.getCollection("ledger_accounts").insert({
  "_id": ObjectId("53c780de845a63e40a00001b"),
  "auto_id": NumberInt(62),
  "group_id": NumberInt(11),
  "ledger_name": "Cable TV expenses",
  "edit_user_id": NumberInt(1),
  "society_id": NumberInt(0),
  "delete_id": NumberInt(0)
});
db.getCollection("ledger_accounts").insert({
  "_id": ObjectId("53c77eb3845a63e40a000010"),
  "auto_id": NumberInt(51),
  "group_id": NumberInt(10),
  "ledger_name": "Electrical R&M",
  "edit_user_id": NumberInt(1),
  "society_id": NumberInt(0),
  "delete_id": NumberInt(0)
});
db.getCollection("ledger_accounts").insert({
  "_id": ObjectId("53c77b14845a63201000001e"),
  "auto_id": NumberInt(31),
  "group_id": NumberInt(6),
  "ledger_name": "Sundry Debtors",
  "edit_user_id": NumberInt(1),
  "society_id": NumberInt(0),
  "delete_id": NumberInt(0)
});
db.getCollection("ledger_accounts").insert({
  "_id": ObjectId("53c77ad6845a63201000001a"),
  "auto_id": NumberInt(27),
  "group_id": NumberInt(5),
  "ledger_name": "Fixed Deposits",
  "edit_user_id": NumberInt(1),
  "society_id": NumberInt(0),
  "delete_id": NumberInt(0)
});
db.getCollection("ledger_accounts").insert({
  "_id": ObjectId("53c779eb845a63201000000c"),
  "auto_id": NumberInt(13),
  "delete_id": NumberInt(0),
  "edit_user_id": NumberInt(1),
  "group_id": NumberInt(3),
  "ledger_name": "Retention A/c",
  "society_id": NumberInt(0)
});
db.getCollection("ledger_accounts").insert({
  "_id": ObjectId("53c779da845a63201000000b"),
  "auto_id": NumberInt(12),
  "group_id": NumberInt(3),
  "ledger_name": "Provisions",
  "edit_user_id": NumberInt(1),
  "society_id": NumberInt(0),
  "delete_id": NumberInt(0)
});
db.getCollection("ledger_accounts").insert({
  "_id": ObjectId("53c779c9845a63201000000a"),
  "auto_id": NumberInt(11),
  "delete_id": NumberInt(0),
  "edit_user_id": NumberInt(1),
  "group_id": NumberInt(11),
  "ledger_name": "Salaries",
  "society_id": NumberInt(0)
});
db.getCollection("ledger_accounts").insert({
  "_id": ObjectId("53c77dc8845a63e40a00000a"),
  "amount": "3500",
  "auto_id": NumberInt(45),
  "group_id": NumberInt(8),
  "ledger_name": "Mobile tower rent",
  "edit_user_id": NumberInt(1),
  "society_id": NumberInt(0),
  "delete_id": NumberInt(0)
});
db.getCollection("ledger_accounts").insert({
  "_id": ObjectId("53c77930845a632010000001"),
  "auto_id": NumberInt(2),
  "group_id": NumberInt(1),
  "ledger_name": "Share Capital",
  "edit_user_id": NumberInt(1),
  "society_id": NumberInt(0),
  "delete_id": NumberInt(0)
});
db.getCollection("ledger_accounts").insert({
  "_id": ObjectId("53c779f6845a63201000000d"),
  "auto_id": NumberInt(14),
  "group_id": NumberInt(3),
  "ledger_name": "Advances & Security Deposits taken",
  "edit_user_id": NumberInt(1),
  "society_id": NumberInt(0),
  "delete_id": NumberInt(0)
});
db.getCollection("ledger_accounts").insert({
  "_id": ObjectId("53c77a43845a632010000011"),
  "auto_id": NumberInt(18),
  "group_id": NumberInt(4),
  "ledger_name": "Accumulated Depreciation",
  "rate": NumberInt(5),
  "edit_user_id": NumberInt(1),
  "society_id": NumberInt(0),
  "delete_id": NumberInt(0)
});
db.getCollection("ledger_accounts").insert({
  "_id": ObjectId("53c77d31845a63e40a000006"),
  "amount": "5000",
  "auto_id": NumberInt(41),
  "group_id": NumberInt(7),
  "ledger_name": "Interest from members",
  "edit_user_id": NumberInt(1),
  "society_id": NumberInt(0),
  "delete_id": NumberInt(0)
});
db.getCollection("ledger_accounts").insert({
  "_id": ObjectId("567a2f230f8880466bf3072d"),
  "auto_id": NumberInt(112),
  "delete_id": NumberLong(0),
  "edit_user_id": NumberLong(1),
  "group_id": NumberInt(6),
  "ledger_name": "Sundry Debtors Control A/c",
  "society_id": NumberLong(0)
});
db.getCollection("ledger_accounts").insert({
  "_id": ObjectId("53c77997845a632010000007"),
  "auto_id": NumberInt(8),
  "delete_id": NumberInt(0),
  "edit_user_id": NumberInt(1),
  "group_id": NumberInt(2),
  "ledger_name": "Entrance Fees (Reserves)",
  "society_id": NumberInt(0)
});
db.getCollection("ledger_accounts").insert({
  "_id": ObjectId("53c77b60845a632010000023"),
  "auto_id": NumberInt(36),
  "group_id": NumberInt(6),
  "ledger_name": "Accrued Interest",
  "edit_user_id": NumberInt(1),
  "society_id": NumberInt(0),
  "delete_id": NumberInt(0)
});
db.getCollection("ledger_accounts").insert({
  "_id": ObjectId("53c77ab9845a632010000019"),
  "auto_id": NumberInt(26),
  "group_id": NumberInt(4),
  "ledger_name": "Vehicles",
  "rate": NumberInt(5),
  "edit_user_id": NumberInt(1),
  "society_id": NumberInt(0),
  "delete_id": NumberInt(0)
});
db.getCollection("ledger_accounts").insert({
  "_id": ObjectId("53c779a4845a632010000008"),
  "auto_id": NumberInt(9),
  "delete_id": NumberInt(0),
  "edit_user_id": NumberInt(1),
  "group_id": NumberInt(2),
  "ledger_name": "Membership premium (Reserves)",
  "society_id": NumberInt(0)
});
db.getCollection("ledger_accounts").insert({
  "_id": ObjectId("53c77982845a632010000006"),
  "auto_id": NumberInt(7),
  "delete_id": NumberInt(0),
  "edit_user_id": NumberInt(1),
  "group_id": NumberInt(2),
  "ledger_name": "Transfer Charges (Reserves)",
  "society_id": NumberInt(0)
});
db.getCollection("ledger_accounts").insert({
  "_id": ObjectId("53c7794f845a632010000003"),
  "auto_id": NumberInt(4),
  "delete_id": NumberInt(0),
  "edit_user_id": NumberInt(1),
  "group_id": NumberInt(4),
  "ledger_name": "Income & Expenditure A/c",
  "society_id": NumberInt(0)
});
db.getCollection("ledger_accounts").insert({
  "_id": ObjectId("53c77942845a632010000002"),
  "auto_id": NumberInt(3),
  "delete_id": NumberInt(0),
  "edit_user_id": NumberInt(1),
  "group_id": NumberInt(2),
  "ledger_name": "Major Repairs Fund (Reserves)",
  "society_id": NumberInt(0)
});
db.getCollection("ledger_accounts").insert({
  "_id": ObjectId("53c77aad845a632010000018"),
  "auto_id": NumberInt(25),
  "group_id": NumberInt(4),
  "ledger_name": "Power Back up & Generator",
  "rate": NumberInt(4),
  "edit_user_id": NumberInt(1),
  "society_id": NumberInt(0),
  "delete_id": NumberInt(0)
});
db.getCollection("ledger_accounts").insert({
  "_id": ObjectId("53c7819d845a63e40a000027"),
  "auto_id": NumberInt(74),
  "group_id": NumberInt(11),
  "ledger_name": "Staff welfare expenses",
  "edit_user_id": NumberInt(1),
  "society_id": NumberInt(0),
  "delete_id": NumberInt(0)
});
db.getCollection("ledger_accounts").insert({
  "_id": ObjectId("53c78168845a63e40a000023"),
  "auto_id": NumberInt(70),
  "group_id": NumberInt(11),
  "ledger_name": "Miscellaneous expenses",
  "edit_user_id": NumberInt(1),
  "society_id": NumberInt(0),
  "delete_id": NumberInt(0)
});
db.getCollection("ledger_accounts").insert({
  "_id": ObjectId("53c780eb845a63e40a00001c"),
  "auto_id": NumberInt(63),
  "delete_id": NumberInt(0),
  "edit_user_id": NumberInt(1),
  "group_id": NumberInt(11),
  "ledger_name": "Telecom & Internet expenses",
  "society_id": NumberInt(0)
});
db.getCollection("ledger_accounts").insert({
  "_id": ObjectId("53c77ede845a63e40a000013"),
  "auto_id": NumberInt(54),
  "group_id": NumberInt(10),
  "ledger_name": "Lifts & Elevators - R&M",
  "edit_user_id": NumberInt(1),
  "society_id": NumberInt(0),
  "delete_id": NumberInt(0)
});
db.getCollection("ledger_accounts").insert({
  "_id": ObjectId("53c7791f845a632010000000"),
  "auto_id": NumberInt(1),
  "group_id": NumberInt(1),
  "ledger_name": "Application Money",
  "edit_user_id": NumberInt(1),
  "society_id": NumberInt(0),
  "delete_id": NumberInt(0)
});
db.getCollection("ledger_accounts").insert({
  "_id": ObjectId("53c77a55845a632010000012"),
  "auto_id": NumberInt(19),
  "group_id": NumberInt(4),
  "ledger_name": "Club Center Equipments",
  "rate": NumberInt(8),
  "edit_user_id": NumberInt(1),
  "society_id": NumberInt(0),
  "delete_id": NumberInt(0)
});
db.getCollection("ledger_accounts").insert({
  "_id": ObjectId("53c77a68845a632010000013"),
  "auto_id": NumberInt(20),
  "group_id": NumberInt(4),
  "ledger_name": "Furniture & Fixtures",
  "rate": NumberInt(10),
  "edit_user_id": NumberInt(1),
  "society_id": NumberInt(0),
  "delete_id": NumberInt(0)
});
db.getCollection("ledger_accounts").insert({
  "_id": ObjectId("53c77a79845a632010000014"),
  "auto_id": NumberInt(21),
  "group_id": NumberInt(4),
  "ledger_name": "Gym Equipments",
  "rate": NumberInt(2),
  "edit_user_id": NumberInt(1),
  "society_id": NumberInt(0),
  "delete_id": NumberInt(0)
});
db.getCollection("ledger_accounts").insert({
  "_id": ObjectId("53c77959845a632010000004"),
  "auto_id": NumberInt(5),
  "delete_id": NumberInt(0),
  "edit_user_id": NumberInt(1),
  "group_id": NumberInt(2),
  "ledger_name": "Reserve Fund Seed Money",
  "society_id": NumberInt(0)
});
db.getCollection("ledger_accounts").insert({
  "_id": ObjectId("53c77a88845a632010000015"),
  "auto_id": NumberInt(22),
  "delete_id": NumberInt(0),
  "edit_user_id": NumberInt(1),
  "group_id": NumberInt(4),
  "ledger_name": "Land",
  "rate": NumberInt(3),
  "society_id": NumberInt(0)
});
db.getCollection("ledger_accounts").insert({
  "_id": ObjectId("53c77b40845a632010000021"),
  "auto_id": NumberInt(34),
  "delete_id": NumberInt(0),
  "edit_user_id": NumberInt(1),
  "group_id": NumberInt(6),
  "ledger_name": "Members Control Accounts",
  "society_id": NumberInt(0)
});
db.getCollection("ledger_accounts").insert({
  "_id": ObjectId("53c78178845a63e40a000024"),
  "auto_id": NumberInt(71),
  "group_id": NumberInt(11),
  "ledger_name": "Postage & Courier charges",
  "edit_user_id": NumberInt(1),
  "society_id": NumberInt(0),
  "delete_id": NumberInt(0)
});
db.getCollection("ledger_accounts").insert({
  "_id": ObjectId("53c781b3845a63e40a000029"),
  "auto_id": NumberInt(76),
  "group_id": NumberInt(11),
  "ledger_name": "Meeting & Welfare expenses",
  "edit_user_id": NumberInt(1),
  "society_id": NumberInt(0),
  "delete_id": NumberInt(0)
});
db.getCollection("ledger_accounts").insert({
  "_id": ObjectId("53c77b52845a632010000022"),
  "auto_id": NumberInt(35),
  "group_id": NumberInt(6),
  "ledger_name": "Tax deducted at source (TDS receivable)",
  "edit_user_id": NumberInt(1),
  "society_id": NumberInt(0),
  "delete_id": NumberInt(0)
});
db.getCollection("ledger_accounts").insert({
  "_id": ObjectId("53c77b6c845a632010000024"),
  "auto_id": NumberInt(37),
  "group_id": NumberInt(6),
  "ledger_name": "Advance given to Vendors",
  "edit_user_id": NumberInt(1),
  "society_id": NumberInt(0),
  "delete_id": NumberInt(0)
});
db.getCollection("ledger_accounts").insert({
  "_id": ObjectId("53c77d50845a63e40a000008"),
  "amount": "3500",
  "auto_id": NumberInt(43),
  "group_id": NumberInt(7),
  "ledger_name": "Non Occupancy Charges",
  "edit_user_id": NumberInt(1),
  "society_id": NumberInt(0),
  "delete_id": NumberInt(0)
});
db.getCollection("ledger_accounts").insert({
  "_id": ObjectId("53c77f66845a63e40a000019"),
  "auto_id": NumberInt(60),
  "group_id": NumberInt(11),
  "ledger_name": "Audit fees",
  "edit_user_id": NumberInt(1),
  "society_id": NumberInt(0),
  "delete_id": NumberInt(0)
});
db.getCollection("ledger_accounts").insert({
  "_id": ObjectId("53c77aa3845a632010000017"),
  "auto_id": NumberInt(24),
  "group_id": NumberInt(4),
  "ledger_name": "Plant & Machinery",
  "rate": NumberInt(6),
  "edit_user_id": NumberInt(1),
  "society_id": NumberInt(0),
  "delete_id": NumberInt(0)
});
db.getCollection("ledger_accounts").insert({
  "_id": ObjectId("53c77a96845a632010000016"),
  "auto_id": NumberInt(23),
  "group_id": NumberInt(4),
  "ledger_name": "Office Equipments",
  "rate": NumberInt(5),
  "edit_user_id": NumberInt(1),
  "society_id": NumberInt(0),
  "delete_id": NumberInt(0)
});
db.getCollection("ledger_accounts").insert({
  "_id": ObjectId("53c77dd2845a63e40a00000b"),
  "amount": "5000",
  "auto_id": NumberInt(46),
  "group_id": NumberInt(8),
  "ledger_name": "Miscellaneous income",
  "edit_user_id": NumberInt(1),
  "society_id": NumberInt(0),
  "delete_id": NumberInt(0)
});
db.getCollection("ledger_accounts").insert({
  "_id": ObjectId("53c77d3e845a63e40a000007"),
  "amount": "4500",
  "auto_id": NumberInt(42),
  "group_id": NumberInt(7),
  "ledger_name": "Maintenance charges",
  "edit_user_id": NumberInt(1),
  "society_id": NumberInt(0),
  "delete_id": NumberInt(0)
});
db.getCollection("ledger_accounts").insert({
  "_id": ObjectId("53c77c76845a63e40a000000"),
  "amount": "4000",
  "auto_id": NumberInt(38),
  "group_id": NumberInt(7),
  "ledger_name": "Cultural Fund contribution",
  "edit_user_id": NumberInt(1),
  "society_id": NumberInt(0),
  "delete_id": NumberInt(0)
});
db.getCollection("ledger_accounts").insert({
  "_id": ObjectId("53c781a8845a63e40a000028"),
  "auto_id": NumberInt(75),
  "group_id": NumberInt(11),
  "ledger_name": "Sundry Balances Written Off",
  "edit_user_id": NumberInt(1),
  "society_id": NumberInt(0),
  "delete_id": NumberInt(0)
});
db.getCollection("ledger_accounts").insert({
  "_id": ObjectId("53c77ed0845a63e40a000012"),
  "auto_id": NumberInt(53),
  "group_id": NumberInt(10),
  "ledger_name": "House keeping charges",
  "edit_user_id": NumberInt(1),
  "society_id": NumberInt(0),
  "delete_id": NumberInt(0)
});
db.getCollection("ledger_accounts").insert({
  "_id": ObjectId("53c77e12845a63e40a00000c"),
  "auto_id": NumberInt(47),
  "group_id": NumberInt(9),
  "ledger_name": "Electricity Expenses",
  "edit_user_id": NumberInt(1),
  "society_id": NumberInt(0),
  "delete_id": NumberInt(0)
});
db.getCollection("ledger_accounts").insert({
  "_id": ObjectId("53c7815d845a63e40a000022"),
  "auto_id": NumberInt(69),
  "group_id": NumberInt(11),
  "ledger_name": "Legal & Professional Charges",
  "edit_user_id": NumberInt(1),
  "society_id": NumberInt(0),
  "delete_id": NumberInt(0)
});
db.getCollection("ledger_accounts").insert({
  "_id": ObjectId("53c78143845a63e40a000020"),
  "auto_id": NumberInt(67),
  "group_id": NumberInt(11),
  "ledger_name": "Depreciation",
  "edit_user_id": NumberInt(1),
  "society_id": NumberInt(0),
  "delete_id": NumberInt(0)
});
db.getCollection("ledger_accounts").insert({
  "_id": ObjectId("53c7812f845a63e40a00001f"),
  "auto_id": NumberInt(66),
  "group_id": NumberInt(11),
  "ledger_name": "Cultural / Festival expenses",
  "edit_user_id": NumberInt(1),
  "society_id": NumberInt(0),
  "delete_id": NumberInt(0)
});
db.getCollection("ledger_accounts").insert({
  "_id": ObjectId("53c78121845a63e40a00001e"),
  "auto_id": NumberInt(65),
  "delete_id": NumberInt(0),
  "edit_user_id": NumberInt(1),
  "group_id": NumberInt(11),
  "ledger_name": "Traveling & conveyance expenses",
  "society_id": NumberInt(0)
});
db.getCollection("ledger_accounts").insert({
  "_id": ObjectId("53c780f8845a63e40a00001d"),
  "auto_id": NumberInt(64),
  "group_id": NumberInt(11),
  "ledger_name": "Computer & sofware expenses",
  "edit_user_id": NumberInt(1),
  "society_id": NumberInt(0),
  "delete_id": NumberInt(0)
});
db.getCollection("ledger_accounts").insert({
  "_id": ObjectId("53c780d1845a63e40a00001a"),
  "auto_id": NumberInt(61),
  "group_id": NumberInt(11),
  "ledger_name": "Bank charges",
  "edit_user_id": NumberInt(1),
  "society_id": NumberInt(0),
  "delete_id": NumberInt(0)
});
db.getCollection("ledger_accounts").insert({
  "_id": ObjectId("53c77f57845a63e40a000018"),
  "auto_id": NumberInt(59),
  "group_id": NumberInt(10),
  "ledger_name": "Swimming pool - R&M",
  "edit_user_id": NumberInt(1),
  "society_id": NumberInt(0),
  "delete_id": NumberInt(0)
});
db.getCollection("ledger_accounts").insert({
  "_id": ObjectId("53c77eed845a63e40a000014"),
  "auto_id": NumberInt(55),
  "group_id": NumberInt(10),
  "ledger_name": "Pest control",
  "edit_user_id": NumberInt(1),
  "society_id": NumberInt(0),
  "delete_id": NumberInt(0)
});
db.getCollection("ledger_accounts").insert({
  "_id": ObjectId("53c77ea7845a63e40a00000f"),
  "auto_id": NumberInt(50),
  "group_id": NumberInt(10),
  "ledger_name": "Building R&M",
  "edit_user_id": NumberInt(1),
  "society_id": NumberInt(0),
  "delete_id": NumberInt(0)
});
db.getCollection("ledger_accounts").insert({
  "_id": ObjectId("53c77e20845a63e40a00000d"),
  "auto_id": NumberInt(48),
  "group_id": NumberInt(9),
  "ledger_name": "Property Tax",
  "edit_user_id": NumberInt(1),
  "society_id": NumberInt(0),
  "delete_id": NumberInt(0)
});
db.getCollection("ledger_accounts").insert({
  "_id": ObjectId("53c77b20845a63201000001f"),
  "auto_id": NumberInt(32),
  "group_id": NumberInt(6),
  "ledger_name": "Cash-in-hand",
  "edit_user_id": NumberInt(1),
  "society_id": NumberInt(0),
  "delete_id": NumberInt(0)
});
db.getCollection("ledger_accounts").insert({
  "_id": ObjectId("53c77af0845a63201000001c"),
  "auto_id": NumberInt(29),
  "group_id": NumberInt(6),
  "ledger_name": "Stock / Inventories",
  "edit_user_id": NumberInt(1),
  "society_id": NumberInt(0),
  "delete_id": NumberInt(0)
});
db.getCollection("ledger_accounts").insert({
  "_id": ObjectId("53c77ae1845a63201000001b"),
  "auto_id": NumberInt(28),
  "group_id": NumberInt(5),
  "ledger_name": "Mutual Funds",
  "edit_user_id": NumberInt(1),
  "society_id": NumberInt(0),
  "delete_id": NumberInt(0)
});
db.getCollection("ledger_accounts").insert({
  "_id": ObjectId("53c77a31845a632010000010"),
  "auto_id": NumberInt(17),
  "group_id": NumberInt(3),
  "ledger_name": "Service Tax payable",
  "edit_user_id": NumberInt(1),
  "society_id": NumberInt(0),
  "delete_id": NumberInt(0)
});
db.getCollection("ledger_accounts").insert({
  "_id": ObjectId("53c77a15845a63201000000e"),
  "auto_id": NumberInt(15),
  "group_id": NumberInt(3),
  "ledger_name": "Sundry Creditors Control A/c",
  "edit_user_id": NumberInt(1),
  "society_id": NumberInt(0),
  "delete_id": NumberInt(0)
});
db.getCollection("ledger_accounts").insert({
  "_id": ObjectId("53c779bc845a632010000009"),
  "auto_id": NumberInt(10),
  "group_id": NumberInt(3),
  "ledger_name": "Advance from Members",
  "edit_user_id": NumberInt(1),
  "society_id": NumberInt(0),
  "delete_id": NumberInt(0)
});
db.getCollection("ledger_accounts").insert({
  "_id": ObjectId("53c77b2d845a632010000020"),
  "auto_id": NumberInt(33),
  "group_id": NumberInt(6),
  "ledger_name": "Bank Accounts",
  "edit_user_id": NumberInt(1),
  "society_id": NumberInt(0),
  "delete_id": NumberInt(0)
});
db.getCollection("ledger_accounts").insert({
  "_id": ObjectId("53c77e2f845a63e40a00000e"),
  "auto_id": NumberInt(49),
  "group_id": NumberInt(9),
  "ledger_name": "Water charges",
  "edit_user_id": NumberInt(1),
  "society_id": NumberInt(0),
  "delete_id": NumberInt(0)
});
db.getCollection("ledger_accounts").insert({
  "_id": ObjectId("53c77ec3845a63e40a000011"),
  "auto_id": NumberInt(52),
  "group_id": NumberInt(10),
  "ledger_name": "Gymnasium R&M",
  "edit_user_id": NumberInt(1),
  "society_id": NumberInt(0),
  "delete_id": NumberInt(0)
});
db.getCollection("ledger_accounts").insert({
  "_id": ObjectId("53c781c2845a63e40a00002a"),
  "auto_id": NumberInt(77),
  "group_id": NumberInt(11),
  "ledger_name": "Interest expenses",
  "edit_user_id": NumberInt(1),
  "society_id": NumberInt(0),
  "delete_id": NumberInt(0)
});
db.getCollection("ledger_accounts").insert({
  "_id": ObjectId("53c77f4c845a63e40a000017"),
  "auto_id": NumberInt(58),
  "group_id": NumberInt(10),
  "ledger_name": "Security charges",
  "edit_user_id": NumberInt(1),
  "society_id": NumberInt(0),
  "delete_id": NumberInt(0)
});
db.getCollection("ledger_accounts").insert({
  "_id": ObjectId("53c77efa845a63e40a000015"),
  "auto_id": NumberInt(56),
  "group_id": NumberInt(10),
  "ledger_name": "Plumbing - R&M",
  "edit_user_id": NumberInt(1),
  "society_id": NumberInt(0),
  "delete_id": NumberInt(0)
});
db.getCollection("ledger_accounts").insert({
  "_id": ObjectId("543e64aa5f66fbc407000005"),
  "auto_id": NumberInt(78),
  "group_id": NumberInt(8),
  "ledger_name": "Advertising Income",
  "edit_user_id": NumberInt(1),
  "society_id": NumberInt(0),
  "delete_id": NumberInt(0),
  "modified": ISODate("2014-10-15T12:12:26.0Z"),
  "created": ISODate("2014-10-15T12:12:26.0Z")
});
db.getCollection("ledger_accounts").insert({
  "_id": ObjectId("53c77d01845a63e40a000004"),
  "amount": "2000",
  "auto_id": NumberInt(39),
  "delete_id": NumberInt(0),
  "edit_user_id": NumberInt(1),
  "group_id": NumberInt(8),
  "ledger_name": "Interest from  Fixed deposits",
  "society_id": NumberInt(0)
});
db.getCollection("ledger_accounts").insert({
  "_id": ObjectId("53c77dba845a63e40a000009"),
  "amount": "2500",
  "auto_id": NumberInt(44),
  "group_id": NumberInt(8),
  "ledger_name": "Income from Advertising & events",
  "edit_user_id": NumberInt(1),
  "society_id": NumberInt(0),
  "delete_id": NumberInt(0)
});
db.getCollection("ledger_accounts").insert({
  "_id": ObjectId("54e86f1f5f66fb6808000019"),
  "auto_id": NumberInt(79),
  "group_id": NumberInt(7),
  "ledger_name": "Sinking Fund",
  "delete_id": NumberInt(0),
  "edit_user_id": NumberInt(1),
  "society_id": NumberInt(0),
  "modified": ISODate("2015-02-21T11:42:23.0Z"),
  "created": ISODate("2015-02-21T11:42:23.0Z")
});
db.getCollection("ledger_accounts").insert({
  "_id": ObjectId("54e86f3d5f66fb5002000018"),
  "auto_id": NumberInt(80),
  "group_id": NumberInt(7),
  "ledger_name": "Repair Fund",
  "delete_id": NumberInt(0),
  "edit_user_id": NumberInt(1),
  "society_id": NumberInt(0),
  "modified": ISODate("2015-02-21T11:42:53.0Z"),
  "created": ISODate("2015-02-21T11:42:53.0Z")
});
db.getCollection("ledger_accounts").insert({
  "_id": ObjectId("54e86f5c5f66fb680800001a"),
  "auto_id": NumberInt(81),
  "group_id": NumberInt(7),
  "ledger_name": "Welfare Fund",
  "delete_id": NumberInt(0),
  "edit_user_id": NumberInt(1),
  "society_id": NumberInt(0),
  "modified": ISODate("2015-02-21T11:43:24.0Z"),
  "created": ISODate("2015-02-21T11:43:24.0Z")
});
db.getCollection("ledger_accounts").insert({
  "_id": ObjectId("54e86f715f66fb5002000019"),
  "auto_id": NumberInt(82),
  "group_id": NumberInt(7),
  "ledger_name": "Lease Rent",
  "delete_id": NumberInt(0),
  "edit_user_id": NumberInt(1),
  "society_id": NumberInt(0),
  "modified": ISODate("2015-02-21T11:43:45.0Z"),
  "created": ISODate("2015-02-21T11:43:45.0Z")
});
db.getCollection("ledger_accounts").insert({
  "_id": ObjectId("54e86f895f66fb1808000016"),
  "auto_id": NumberInt(83),
  "group_id": NumberInt(7),
  "ledger_name": "Parking Charges",
  "delete_id": NumberInt(0),
  "edit_user_id": NumberInt(1),
  "society_id": NumberInt(0),
  "modified": ISODate("2015-02-21T11:44:09.0Z"),
  "created": ISODate("2015-02-21T11:44:09.0Z")
});
db.getCollection("ledger_accounts").insert({
  "_id": ObjectId("54e86fa25f66fb500200001a"),
  "auto_id": NumberInt(84),
  "group_id": NumberInt(7),
  "ledger_name": "Water Charges",
  "delete_id": NumberInt(0),
  "edit_user_id": NumberInt(1),
  "society_id": NumberInt(0),
  "modified": ISODate("2015-02-21T11:44:34.0Z"),
  "created": ISODate("2015-02-21T11:44:34.0Z")
});
db.getCollection("ledger_accounts").insert({
  "_id": ObjectId("54e86fb95f66fb500200001b"),
  "auto_id": NumberInt(85),
  "created": ISODate("2015-02-21T11:44:57.0Z"),
  "delete_id": NumberInt(0),
  "edit_user_id": NumberInt(1),
  "group_id": NumberInt(7),
  "ledger_name": "Municipal Taxes",
  "modified": ISODate("2015-02-21T11:44:57.0Z"),
  "society_id": NumberInt(0)
});
db.getCollection("ledger_accounts").insert({
  "_id": ObjectId("54e86ffd5f66fb680800001b"),
  "auto_id": NumberInt(86),
  "group_id": NumberInt(7),
  "ledger_name": "Electricity Charges",
  "delete_id": NumberInt(0),
  "edit_user_id": NumberInt(1),
  "society_id": NumberInt(0),
  "modified": ISODate("2015-02-21T11:46:05.0Z"),
  "created": ISODate("2015-02-21T11:46:05.0Z")
});
db.getCollection("ledger_accounts").insert({
  "_id": ObjectId("54e8702e5f66fb500200001c"),
  "auto_id": NumberInt(87),
  "group_id": NumberInt(7),
  "ledger_name": "Insurance Charges",
  "delete_id": NumberInt(1),
  "edit_user_id": NumberInt(1),
  "society_id": NumberInt(0),
  "modified": ISODate("2015-02-21T11:46:54.0Z"),
  "created": ISODate("2015-02-21T11:46:54.0Z")
});
db.getCollection("ledger_accounts").insert({
  "_id": ObjectId("55657e400f8880c92e5ade01"),
  "auto_id": NumberInt(91),
  "created": ISODate("2015-05-27T08:20:15.246Z"),
  "delete_id": NumberLong(0),
  "edit_user_id": NumberLong(3),
  "group_id": NumberInt(4),
  "ledger_name": "Printer",
  "modified": ISODate("2015-05-27T08:20:15.246Z"),
  "rate": NumberLong(5),
  "society_id": NumberLong(6)
});
db.getCollection("ledger_accounts").insert({
  "_id": ObjectId("55950dc80f8880fa19c33f6a"),
  "auto_id": NumberInt(92),
  "created": ISODate("2015-07-02T10:09:12.410Z"),
  "delete_id": NumberLong(0),
  "edit_user_id": NumberLong(2),
  "group_id": NumberInt(7),
  "ledger_name": "Cheque Return charges",
  "modified": ISODate("2015-07-02T10:09:12.410Z"),
  "society_id": NumberLong(2)
});
db.getCollection("ledger_accounts").insert({
  "_id": ObjectId("55d8655f0f8880cc07c33f6c"),
  "auto_id": NumberInt(93),
  "created": ISODate("2015-07-02T10:09:12.410Z"),
  "delete_id": NumberLong(0),
  "edit_user_id": NumberLong(2),
  "group_id": NumberInt(7),
  "ledger_name": "Repair and Renovation Fund",
  "modified": ISODate("2015-07-02T10:09:12.410Z"),
  "society_id": NumberLong(3)
});
db.getCollection("ledger_accounts").insert({
  "_id": ObjectId("55d865e80f8880cc07c33f6d"),
  "auto_id": NumberInt(94),
  "created": ISODate("2015-07-02T10:09:12.410Z"),
  "delete_id": NumberLong(0),
  "edit_user_id": NumberLong(2),
  "group_id": NumberInt(7),
  "ledger_name": "LAT Charges",
  "modified": ISODate("2015-07-02T10:09:12.410Z"),
  "society_id": NumberLong(3)
});
db.getCollection("ledger_accounts").insert({
  "_id": ObjectId("55d9c14f5f66fb381900004c"),
  "auto_id": NumberInt(95),
  "created": ISODate("2015-07-02T10:09:12.410Z"),
  "delete_id": NumberLong(0),
  "edit_user_id": NumberLong(2),
  "group_id": NumberInt(7),
  "ledger_name": "Muncipal Tax",
  "modified": ISODate("2015-07-02T10:09:12.410Z"),
  "society_id": NumberLong(3)
});
db.getCollection("ledger_accounts").insert({
  "_id": ObjectId("5617ca630f88808f1d8b38eb"),
  "auto_id": NumberInt(88),
  "created": ISODate("2015-07-02T10:09:12.410Z"),
  "delete_id": NumberLong(0),
  "group_id": NumberInt(11),
  "ledger_name": "Reversals & Adjustments",
  "modified": ISODate("2015-07-02T10:09:12.410Z"),
  "society_id": NumberLong(0)
});
db.getCollection("ledger_accounts").insert({
  "_id": ObjectId("565c49ae0f8880142df97414"),
  "auto_id": NumberInt(97),
  "created": ISODate("2015-11-30T13:05:50.633Z"),
  "delete_id": NumberLong(0),
  "edit_user_id": NumberLong(1),
  "group_id": NumberInt(4),
  "ledger_name": "Building",
  "modified": ISODate("2015-11-30T13:05:50.633Z"),
  "society_id": NumberLong(0)
});
db.getCollection("ledger_accounts").insert({
  "_id": ObjectId("565c49f20f8880142df97415"),
  "auto_id": NumberInt(98),
  "created": ISODate("2015-11-30T13:06:58.907Z"),
  "delete_id": NumberLong(0),
  "edit_user_id": NumberLong(1),
  "group_id": NumberInt(4),
  "ledger_name": "Computers",
  "modified": ISODate("2015-11-30T13:06:58.907Z"),
  "society_id": NumberLong(0)
});
db.getCollection("ledger_accounts").insert({
  "_id": ObjectId("565c4a1a0f8880fe0df9740e"),
  "auto_id": NumberInt(99),
  "created": ISODate("2015-11-30T13:07:38.947Z"),
  "delete_id": NumberLong(0),
  "edit_user_id": NumberLong(1),
  "group_id": NumberInt(4),
  "ledger_name": "Surveillance & Security Systems",
  "modified": ISODate("2015-11-30T13:07:38.947Z"),
  "society_id": NumberLong(0)
});
db.getCollection("ledger_accounts").insert({
  "_id": ObjectId("565c4da90f8880e05bf9740d"),
  "auto_id": NumberInt(100),
  "created": ISODate("2015-11-30T13:22:49.259Z"),
  "delete_id": NumberLong(0),
  "edit_user_id": NumberLong(1),
  "group_id": NumberInt(10),
  "ledger_name": "Club / Recreation Center expenses",
  "modified": ISODate("2015-11-30T13:22:49.259Z"),
  "society_id": NumberLong(0)
});
db.getCollection("ledger_accounts").insert({
  "_id": ObjectId("565c4dde0f8880b532f97413"),
  "auto_id": NumberInt(101),
  "created": ISODate("2015-11-30T13:23:42.760Z"),
  "delete_id": NumberLong(0),
  "edit_user_id": NumberLong(1),
  "group_id": NumberInt(10),
  "ledger_name": "Garden / Lawn expenses",
  "modified": ISODate("2015-11-30T13:23:42.760Z"),
  "society_id": NumberLong(0)
});
db.getCollection("ledger_accounts").insert({
  "_id": ObjectId("565c4e600f8880ba53f9740c"),
  "auto_id": NumberInt(102),
  "created": ISODate("2015-11-30T13:25:52.527Z"),
  "delete_id": NumberLong(0),
  "edit_user_id": NumberLong(1),
  "group_id": NumberInt(10),
  "ledger_name": "General Repairs & Maintenance",
  "modified": ISODate("2015-11-30T13:25:52.527Z"),
  "society_id": NumberLong(0)
});
db.getCollection("ledger_accounts").insert({
  "_id": ObjectId("565c4eb00f8880a750f9740e"),
  "auto_id": NumberInt(103),
  "created": ISODate("2015-11-30T13:27:12.417Z"),
  "delete_id": NumberLong(0),
  "edit_user_id": NumberLong(1),
  "group_id": NumberInt(10),
  "ledger_name": "Fire & Safety expenses",
  "modified": ISODate("2015-11-30T13:27:12.417Z"),
  "society_id": NumberLong(0)
});
db.getCollection("ledger_accounts").insert({
  "_id": ObjectId("565c4edd0f8880b953f9740c"),
  "auto_id": NumberInt(104),
  "created": ISODate("2015-11-30T13:27:57.427Z"),
  "delete_id": NumberLong(0),
  "edit_user_id": NumberLong(1),
  "group_id": NumberInt(11),
  "ledger_name": "Subscription charges",
  "modified": ISODate("2015-11-30T13:27:57.427Z"),
  "society_id": NumberLong(0)
});
db.getCollection("ledger_accounts").insert({
  "_id": ObjectId("56692ec60f88807369362c38"),
  "auto_id": NumberInt(105),
  "created": ISODate("2015-12-10T07:50:30.107Z"),
  "delete_id": NumberLong(0),
  "edit_user_id": NumberLong(1),
  "group_id": NumberInt(5),
  "ledger_name": "Deposits with Electricity Cos",
  "modified": ISODate("2015-12-10T07:50:30.107Z"),
  "society_id": NumberLong(0)
});
db.getCollection("ledger_accounts").insert({
  "_id": ObjectId("56692f440f88809c52362c30"),
  "auto_id": NumberInt(106),
  "created": ISODate("2015-12-10T07:52:36.162Z"),
  "delete_id": NumberLong(0),
  "edit_user_id": NumberLong(1),
  "group_id": NumberInt(5),
  "ledger_name": "Deposits with Water Supply Cos",
  "modified": ISODate("2015-12-10T07:52:36.162Z"),
  "society_id": NumberLong(0)
});
db.getCollection("ledger_accounts").insert({
  "_id": ObjectId("56692f8b0f8880d469362c34"),
  "auto_id": NumberInt(107),
  "created": ISODate("2015-12-10T07:53:47.119Z"),
  "delete_id": NumberLong(0),
  "edit_user_id": NumberLong(1),
  "group_id": NumberInt(8),
  "ledger_name": "Interest from saving bank accounts",
  "modified": ISODate("2015-12-10T07:53:47.118Z"),
  "society_id": NumberLong(0)
});
db.getCollection("ledger_accounts").insert({
  "_id": ObjectId("56692fbe0f88809c52362c31"),
  "auto_id": NumberInt(108),
  "created": ISODate("2015-12-10T07:54:38.765Z"),
  "delete_id": NumberLong(0),
  "edit_user_id": NumberLong(1),
  "group_id": NumberInt(2),
  "ledger_name": "Sinking Fund (Reserves)",
  "modified": ISODate("2015-12-10T07:54:38.765Z"),
  "society_id": NumberLong(0)
});
db.getCollection("ledger_accounts").insert({
  "_id": ObjectId("566931e50f8880fa4f362c30"),
  "auto_id": NumberInt(109),
  "created": ISODate("2015-12-10T08:03:49.568Z"),
  "delete_id": NumberLong(0),
  "edit_user_id": NumberLong(1),
  "group_id": NumberInt(5),
  "ledger_name": "Shares of Federation",
  "modified": ISODate("2015-12-10T08:03:49.568Z"),
  "society_id": NumberLong(0)
});
db.getCollection("ledger_accounts").insert({
  "_id": ObjectId("5669331b0f88809c52362c32"),
  "auto_id": NumberInt(110),
  "created": ISODate("2015-12-10T08:08:59.380Z"),
  "delete_id": NumberLong(0),
  "edit_user_id": 141,
  "group_id": NumberInt(7),
  "ledger_name": "CIDCO Service charges",
  "modified": ISODate("2015-12-10T08:08:59.380Z"),
  "society_id": NumberLong(8)
});
db.getCollection("ledger_accounts").insert({
  "_id": ObjectId("566947210f88809a51362c30"),
  "auto_id": NumberInt(111),
  "created": ISODate("2015-12-10T09:34:25.289Z"),
  "delete_id": NumberLong(0),
  "edit_user_id": 141,
  "group_id": NumberInt(3),
  "ledger_name": "Contribution for Conveyance Deed",
  "modified": ISODate("2015-12-10T09:34:25.289Z"),
  "society_id": NumberLong(8)
});
