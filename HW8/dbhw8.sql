CREATE TABLE athlete (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fist_name VARCHAR(100),
    surname VARCHAR(100),
    gender VARCHAR(10),
    birthdate DATE,
    province VARCHAR(100),
    idNumber VARCHAR(50),
    sport VARCHAR(100),
    documents TEXT,
    currentHomenumber VARCHAR(100),
    currentGroup VARCHAR(50),
    cerrentRoad VARCHAR(100),
    cantoncu VARCHAR(100),
    districtcu VARCHAR(100),
    provincecu VARCHAR(100),
    zipcodecu VARCHAR(10),
    telephonenumbercu VARCHAR(15),
    Studying2 VARCHAR(100),
    Nameofeducationalinstitution2 VARCHAR(100),
    houseNumber2 VARCHAR(100),
    road2 VARCHAR(100),
    canton2 VARCHAR(100),
    district2 VARCHAR(100),
    province2 VARCHAR(100),
    zipcode2 VARCHAR(10),
    telephonenumber2 VARCHAR(15),
    workyear INT,
    workmonth INT,
    name3 VARCHAR(100),
    houseNumber3 VARCHAR(100),
    road3 VARCHAR(100),
    canton3 VARCHAR(100),
    district3 VARCHAR(100),
    province3 VARCHAR(100),
    zipcode3 VARCHAR(10),
    telephonenumber3 VARCHAR(15),
    Currentcareerdate DATE,
    officerSignaturename VARCHAR(100),
    officerSignaturedate DATE,
    presidentSignaturename VARCHAR(100),
    presidentSignaturenamedate DATE
);
INSERT INTO `athlete` (fist_name,surname,gender,birthdate,province,idNumber,sport,documents,currentHomenumber,currentGroup,cerrentRoad,cantoncu,districtcu,provincecu,zipcodecu,telephonenumbercu,Studying2,Nameofeducationalinstitution2,houseNumber2,road2,canton2,district2,province2,zipcode2,telephonenumber2,workyear,workmonth,name3,houseNumber3,road3,canton3,district3,province3,zipcode3,telephonenumber3,Currentcareerdate,officerSignaturename,officerSignaturedate,presidentSignaturename,presidentSignaturenamedate)
VALUES
('สมาย', 'สุขดี', 'หญิง', '1989-03-12', 'ชลบุรี', '951753486', 'กอล์ฟ', 'บัตรประชาชน, ใบรับรองแพทย์', '12', '2', 'ถนนกอล์ฟ', 'สัตหีบ', 'ชลบุรี', 'ชลบุรี', '20250', '0811236547', 'ปริญญาตรี', 'มหาวิทยาลัย K', '23', 'ถนนปาล์ม', 'สัตหีบ', 'ชลบุรี', 'ชลบุรี', '20250', '0811236547', 7, 15, 'บริษัท K', '789', 'ถนนแฟร์เวย์', 'สัตหีบ', 'ชลบุรี', 'ชลบุรี', '20250', '0811236547', '2020-03-12', 'สมชาย เกิดดี', '2020-03-12', 'สมพร ก่อเกิด', '2020-03-12'),
('มาร์ค', 'ลี', 'ชาย', '1992-07-09', 'กระบี่', '123789654', 'โต้คลื่น', 'พาสปอร์ต, ปริญญาบัตร', '45', '7', 'ถนนมหาสมุทร', 'อ่าวนาง', 'กระบี่', 'กระบี่', '81000', '0818529517', 'ปริญญาตรี', 'มหาวิทยาลัย L', '67', 'ถนนเวฟ', 'อ่าวนาง', 'กระบี่', 'กระบี่', '81000', '0818529517', 9, 22, 'บริษัท L', '234', 'ถนนบีช', 'อ่าวนาง', 'กระบี่', 'กระบี่', '81000', '0818529517', '2020-07-09', 'สมชาย เกิดดี', '2020-07-09', 'สมพร ก่อเกิด', '2020-07-09'),
('แนนซี่', 'คิม', 'หญิง', '1991-11-23', 'นครราชสีมา', '654321753', 'ยิงธนู', 'บัตรประชาชน, ใบรับรองแพทย์', '34', '5', 'ถนนโบว์', 'ปากช่อง', 'นครราชสีมา', 'นครราชสีมา', '30000', '0813214569', 'ปริญญาโท', 'มหาวิทยาลัย M', '56', 'ถนนแอร์โรว์', 'ปากช่อง', 'นครราชสีมา', 'นครราชสีมา', '30000', '0813214569', 6, 13, 'บริษัท M', '789', 'ถนนควิเวอร์', 'ปากช่อง', 'นครราชสีมา', 'นครราชสีมา', '30000', '0813214569', '2020-11-23', 'สมชาย เกิดดี', '2020-11-23', 'สมพร ก่อเกิด', '2020-11-23'),
('เจมส์', 'สก็อต', 'ชาย', '1994-04-05', 'สมุทรปราการ', '951753468', 'ดำน้ำ', 'บัตรประชาชน, สูติบัตร', '98', '2', 'ถนนท่าเรือ', 'เมือง', 'สมุทรปราการ', 'สมุทรปราการ', '10270', '0819875642', 'ปริญญาตรี', 'มหาวิทยาลัย N', '67', 'ถนนแองเคอร์', 'เมือง', 'สมุทรปราการ', 'สมุทรปราการ', '10270', '0819875642', 4, 9, 'บริษัท N', '456', 'ถนนเซล', 'เมือง', 'สมุทรปราการ', 'สมุทรปราการ', '10270', '0819875642', '2020-04-05', 'สมชาย เกิดดี', '2020-04-05', 'สมพร ก่อเกิด', '2020-04-05'),
('โซเฟีย', 'กรีน', 'หญิง', '1993-08-17', 'นครปฐม', '789654123', 'เทนนิส', 'พาสปอร์ต, ปริญญาบัตร', '45', '6', 'ถนนคอร์ต', 'พุทธมณฑล', 'นครปฐม', 'นครปฐม', '73170', '0817539512', 'ปริญญาตรี', 'มหาวิทยาลัย O', '23', 'ถนนบอล', 'พุทธมณฑล', 'นครปฐม', 'นครปฐม', '73170', '0817539512', 7, 18, 'บริษัท O', '234', 'ถนนแมทช์', 'พุทธมณฑล', 'นครปฐม', 'นครปฐม', '73170', '0817539512', '2020-08-17', 'สมชาย เกิดดี', '2020-08-17', 'สมพร ก่อเกิด', '2020-08-17'),
('แดเนียล', 'แฮร์ริส', 'ชาย', '1995-06-25', 'ลำปาง', '654987321', 'ยกน้ำหนัก', 'บัตรประชาชน, ใบรับรองแพทย์', '78', '4', 'ถนนลิฟต์', 'เมือง', 'ลำปาง', 'ลำปาง', '52000', '0817531234', 'ปริญญาโท', 'มหาวิทยาลัย P', '12', 'ถนนบาร์เบล', 'เมือง', 'ลำปาง', 'ลำปาง', '52000', '0817531234', 8, 22, 'บริษัท P', '456', 'ถนนสเตรง', 'เมือง', 'ลำปาง', 'ลำปาง', '52000', '0817531234', '2020-06-25', 'สมชาย เกิดดี', '2020-06-25', 'สมพร ก่อเกิด', '2020-06-25'),
('โอลิเวีย', 'อดัมส์', 'หญิง', '1986-10-01', 'พิษณุโลก', '159753456', 'พายเรือ', 'บัตรประชาชน, สูติบัตร', '98', '5', 'ถนนริเวอร์แบงค์', 'เมือง', 'พิษณุโลก', 'พิษณุโลก', '65000', '0818527531', 'ปริญญาโท', 'มหาวิทยาลัย Q', '34', 'ถนนพายเรือ', 'เมือง', 'พิษณุโลก', 'พิษณุโลก', '65000', '0818527531', 10, 28, 'บริษัท Q', '123', 'ถนนวอเตอร์', 'เมือง', 'พิษณุโลก', 'พิษณุโลก', '65000', '0818527531', '2020-10-01', 'สมชาย เกิดดี', '2020-10-01', 'สมพร ก่อเกิด', '2020-10-01'),
('อีธาน', 'เบเกอร์', 'ชาย', '1992-12-19', 'พระนครศรีอยุธยา', '357951852', 'คริกเก็ต', 'พาสปอร์ต, ปริญญาบัตร', '23', '4', 'ถนนพิตช์', 'เมือง', 'พระนครศรีอยุธยา', 'พระนครศรีอยุธยา', '13000', '0816549871', 'ปริญญาตรี', 'มหาวิทยาลัย R', '67', 'ถนนบาวด์ดารี', 'เมือง', 'พระนครศรีอยุธยา', 'พระนครศรีอยุธยา', '13000', '0816549871', 11, 17, 'บริษัท R', '234', 'ถนนแบท', 'เมือง', 'พระนครศรีอยุธยา', 'พระนครศรีอยุธยา', '13000', '0816549871', '2020-12-19', 'สมชาย เกิดดี', '2020-12-19', 'สมพร ก่อเกิด', '2020-12-19'),
('เลียม', 'วอล์กเกอร์', 'ชาย', '1993-01-10', 'เลย', '789654258', 'ปีนเขา', 'บัตรประชาชน, ใบรับรองแพทย์', '54', '6', 'ถนนพีค', 'เมือง', 'เลย', 'เลย', '42000', '0819874561', 'ปริญญาตรี', 'มหาวิทยาลัย S', '78', 'ถนนไต่เขา', 'เมือง', 'เลย', 'เลย', '42000', '0819874561', 6, 13, 'บริษัท S', '123', 'ถนนร็อค', 'เมือง', 'เลย', 'เลย', '42000', '0819874561', '2020-01-10', 'สมชาย เกิดดี', '2020-01-10', 'สมพร ก่อเกิด', '2020-01-10'),
('โซเฟีย', 'เมเยอร์', 'หญิง', '1990-09-17', 'สมุทรสาคร', '159357852', 'ว่ายน้ำ', 'บัตรประชาชน, ปริญญาบัตร', '76', '3', 'ถนนโกล', 'บ้านแพ้ว', 'สมุทรสาคร', 'สมุทรสาคร', '74000', '0813579514', 'ปริญญาโท', 'มหาวิทยาลัย T', '45', 'ถนนเลน', 'บ้านแพ้ว', 'สมุทรสาคร', 'สมุทรสาคร', '74000', '0813579514', 5, 14, 'บริษัท T', '456', 'ถนนสวิม', 'บ้านแพ้ว', 'สมุทรสาคร', 'สมุทรสาคร', '74000', '0813579514', '2020-09-17', 'สมชาย เกิดดี', '2020-09-17', 'สมพร ก่อเกิด', '2020-09-17'),
('เคธี่', 'โจนส์', 'หญิง', '1995-05-15', 'กรุงเทพ', '258741963', 'มวย', 'บัตรประชาชน, ใบรับรองแพทย์', '32', '1', 'ถนนชกมวย', 'คลองเตย', 'กรุงเทพ', 'กรุงเทพ', '10110', '0814561239', 'ปริญญาโท', 'มหาวิทยาลัย U', '24', 'ถนนราม', 'คลองเตย', 'กรุงเทพ', 'กรุงเทพ', '10110', '0814561239', 4, 12, 'บริษัท U', '123', 'ถนนสังเวียน', 'คลองเตย', 'กรุงเทพ', 'กรุงเทพ', '10110', '0814561239', '2020-05-15', 'สมชาย เกิดดี', '2020-05-15', 'สมพร ก่อเกิด', '2020-05-15'),
('ดาเนียล', 'ริเวร่า', 'ชาย', '1988-02-23', 'เชียงใหม่', '951258456', 'ฟุตบอล', 'พาสปอร์ต, ปริญญาบัตร', '11', '3', 'ถนนฟุตบอล', 'เมือง', 'เชียงใหม่', 'เชียงใหม่', '50000', '0816547893', 'ปริญญาโท', 'มหาวิทยาลัย V', '76', 'ถนนเลค', 'เมือง', 'เชียงใหม่', 'เชียงใหม่', '50000', '0816547893', 10, 20, 'บริษัท V', '45', 'ถนนเก่า', 'เมือง', 'เชียงใหม่', 'เชียงใหม่', '50000', '0816547893', '2020-02-23', 'สมชาย เกิดดี', '2020-02-23', 'สมพร ก่อเกิด', '2020-02-23'),
('แอนนา', 'บี', 'หญิง', '1994-03-05', 'อุบลราชธานี', '654159753', 'แบดมินตัน', 'บัตรประชาชน, สูติบัตร', '88', '8', 'ถนนแบด', 'เมือง', 'อุบลราชธานี', 'อุบลราชธานี', '34000', '0819871234', 'ปริญญาโท', 'มหาวิทยาลัย W', '12', 'ถนนเจริญ', 'เมือง', 'อุบลราชธานี', 'อุบลราชธานี', '34000', '0819871234', 5, 16, 'บริษัท W', '34', 'ถนนแข่ง', 'เมือง', 'อุบลราชธานี', 'อุบลราชธานี', '34000', '0819871234', '2020-03-05', 'สมชาย เกิดดี', '2020-03-05', 'สมพร ก่อเกิด', '2020-03-05'),
('ราฟาเอล', 'ซานเชซ', 'ชาย', '1990-07-12', 'สงขลา', '753951456', 'วอลเลย์บอล', 'พาสปอร์ต, ปริญญาบัตร', '90', '9', 'ถนนวอลเลย์', 'หาดใหญ่', 'สงขลา', 'สงขลา', '90110', '0812584567', 'ปริญญาตรี', 'มหาวิทยาลัย X', '45', 'ถนนดอกไม้', 'หาดใหญ่', 'สงขลา', 'สงขลา', '90110', '0812584567', 8, 19, 'บริษัท X', '123', 'ถนนชายหาด', 'หาดใหญ่', 'สงขลา', 'สงขลา', '90110', '0812584567', '2020-07-12', 'สมชาย เกิดดี', '2020-07-12', 'สมพร ก่อเกิด', '2020-07-12'),
('อาเดรียน', 'ปาร์ค', 'ชาย', '1996-09-20', 'บุรีรัมย์', '147258369', 'ขี่ม้า', 'บัตรประชาชน, สูติบัตร', '20', '3', 'ถนนขี่ม้า', 'เมือง', 'บุรีรัมย์', 'บุรีรัมย์', '31000', '0816543210', 'ปริญญาโท', 'มหาวิทยาลัย Y', '34', 'ถนนฟาร์ม', 'เมือง', 'บุรีรัมย์', 'บุรีรัมย์', '31000', '0816543210', 7, 18, 'บริษัท Y', '56', 'ถนนวิ่ง', 'เมือง', 'บุรีรัมย์', 'บุรีรัมย์', '31000', '0816543210', '2020-09-20', 'สมชาย เกิดดี', '2020-09-20', 'สมพร ก่อเกิด', '2020-09-20'),
('เอ็มม่า', 'วัตสัน', 'หญิง', '1992-05-25', 'นครพนม', '159753852', 'แบดมินตัน', 'บัตรประชาชน, สูติบัตร', '37', '4', 'ถนนกีฬา', 'เมือง', 'นครพนม', 'นครพนม', '48000', '0812345678', 'ปริญญาตรี', 'มหาวิทยาลัย Z', '56', 'ถนนเหรียญ', 'เมือง', 'นครพนม', 'นครพนม', '48000', '0812345678', 3, 10, 'บริษัท Z', '12', 'ถนนไทเกอร์', 'เมือง', 'นครพนม', 'นครพนม', '48000', '0812345678', '2020-05-25', 'สมชาย เกิดดี', '2020-05-25', 'สมพร ก่อเกิด', '2020-05-25'),
('โทมัส', 'อัลบา', 'ชาย', '1990-11-30', 'เชียงราย', '456789123', 'ปั่นจักรยาน', 'พาสปอร์ต, ปริญญาบัตร', '87', '6', 'ถนนปั่น', 'เมือง', 'เชียงราย', 'เชียงราย', '57000', '0819876543', 'ปริญญาโท', 'มหาวิทยาลัย AA', '45', 'ถนนการ์เด้น', 'เมือง', 'เชียงราย', 'เชียงราย', '57000', '0819876543', 4, 12, 'บริษัท AA', '34', 'ถนนสีเขียว', 'เมือง', 'เชียงราย', 'เชียงราย', '57000', '0819876543', '2020-11-30', 'สมชาย เกิดดี', '2020-11-30', 'สมพร ก่อเกิด', '2020-11-30'),
('โอลิเวีย', 'เลอวิส', 'หญิง', '1994-02-15', 'นครนายก', '321654987', 'ว่ายน้ำ', 'บัตรประชาชน, ใบรับรองแพทย์', '22', '3', 'ถนนน้ำ', 'เมือง', 'นครนายก', 'นครนายก', '26000', '0811239876', 'ปริญญาตรี', 'มหาวิทยาลัย BB', '67', 'ถนนสะพาน', 'เมือง', 'นครนายก', 'นครนายก', '26000', '0811239876', 5, 14, 'บริษัท BB', '45', 'ถนนน้ำนอง', 'เมือง', 'นครนายก', 'นครนายก', '26000', '0811239876', '2020-02-15', 'สมชาย เกิดดี', '2020-02-15', 'สมพร ก่อเกิด', '2020-02-15'),
('เลอาห์', 'โบว์แมน', 'หญิง', '1991-08-07', 'ระยอง', '789456123', 'ฟุตซอล', 'พาสปอร์ต, สูติบัตร', '53', '2', 'ถนนฟุตซอล', 'เมือง', 'ระยอง', 'ระยอง', '21000', '0816547890', 'ปริญญาโท', 'มหาวิทยาลัย CC', '89', 'ถนนสายพริก', 'เมือง', 'ระยอง', 'ระยอง', '21000', '0816547890', 6, 19, 'บริษัท CC', '23', 'ถนนน้ำพุ', 'เมือง', 'ระยอง', 'ระยอง', '21000', '0816547890', '2020-08-07', 'สมชาย เกิดดี', '2020-08-07', 'สมพร ก่อเกิด', '2020-08-07'),
('นิโคลัส', 'เฮส', 'ชาย', '1989-12-29', 'สุรินทร์', '159357486', 'ฟุตบอล', 'บัตรประชาชน, ปริญญาบัตร', '41', '5', 'ถนนบอล', 'เมือง', 'สุรินทร์', 'สุรินทร์', '32000', '0819874568', 'ปริญญาโท', 'มหาวิทยาลัย DD', '25', 'ถนนข้าวโพด', 'เมือง', 'สุรินทร์', 'สุรินทร์', '32000', '0819874568', 7, 20, 'บริษัท DD', '67', 'ถนนเส้นชัย', 'เมือง', 'สุรินทร์', 'สุรินทร์', '32000', '0819874568', '2020-12-29', 'สมชาย เกิดดี', '2020-12-29', 'สมพร ก่อเกิด', '2020-12-29');

