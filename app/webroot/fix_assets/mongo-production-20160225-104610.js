
/** flat_type_names indexes **/
db.getCollection("flat_type_names").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** flat_type_names records **/
db.getCollection("flat_type_names").insert({
  "_id": ObjectId("54d84547576b929009000000"),
  "auto_id": NumberInt(1),
  "flat_name": "1 BHK"
});
db.getCollection("flat_type_names").insert({
  "_id": ObjectId("54d84557576b929009000001"),
  "auto_id": NumberInt(2),
  "flat_name": "2 BHK"
});
db.getCollection("flat_type_names").insert({
  "_id": ObjectId("54d84561576b928c09000003"),
  "auto_id": NumberInt(3),
  "flat_name": "3 BHK"
});
db.getCollection("flat_type_names").insert({
  "_id": ObjectId("54d8456d576b929409000006"),
  "auto_id": NumberInt(4),
  "flat_name": "4 BHK"
});
db.getCollection("flat_type_names").insert({
  "_id": ObjectId("558796d20f8880680ac33f84"),
  "auto_id": NumberLong(5),
  "flat_name": "Shop"
});
db.getCollection("flat_type_names").insert({
  "_id": ObjectId("56597b195f66fbc40f000095"),
  "auto_id": NumberLong(6),
  "flat_name": "Office"
});
