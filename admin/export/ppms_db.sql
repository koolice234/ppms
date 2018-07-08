DROP TABLE backup;

CREATE TABLE `backup` (
  `backup_id` int(11) NOT NULL AUTO_INCREMENT,
  `remarks` varchar(50) NOT NULL,
  `backup_date` varchar(50) NOT NULL,
  PRIMARY KEY (`backup_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO backup VALUES("1","Successfully exported database","February 26, 2018, 4:11 pm"); 
INSERT INTO backup VALUES("2","Successfully imported database","February 26, 2018, 4:17 pm"); 



DROP TABLE hematology;

CREATE TABLE `hematology` (
  `hema_ID` int(5) NOT NULL AUTO_INCREMENT,
  `sched_ID` int(5) NOT NULL,
  `patient_ID` int(5) NOT NULL,
  `hema_date` date NOT NULL,
  `hema_hemoglobin` int(10) NOT NULL,
  `hema_hematocrit` int(10) NOT NULL,
  `hema_rbcCount` int(10) NOT NULL,
  `hema_wbcCount` int(10) NOT NULL,
  `hema_plateletCount` int(10) NOT NULL,
  `hema_neutropils` int(10) NOT NULL,
  `hema_eosinophils` int(10) NOT NULL,
  `hema_basophils` int(10) NOT NULL,
  `hema_totalDiffCount` int(10) NOT NULL,
  `hema_monocytes` int(10) NOT NULL,
  PRIMARY KEY (`hema_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO hematology VALUES("1","39","30","2018-02-16","169","169","169","169","169","169","169","169","169","169"); 
INSERT INTO hematology VALUES("2","42","21","2018-02-16","123","180","180","180","180","180","180","180","180","180"); 



DROP TABLE pathology;

CREATE TABLE `pathology` (
  `pathology_ID` int(5) NOT NULL AUTO_INCREMENT,
  `sched_ID` int(5) NOT NULL,
  `patient_ID` int(5) NOT NULL,
  `pathology_date` date NOT NULL,
  `pathology_lca` varchar(11) NOT NULL,
  `pathology_plap` varchar(11) NOT NULL,
  `pathology_cytokeratin` varchar(11) NOT NULL,
  `pathology_nse` varchar(11) NOT NULL,
  `pathology_vimetin` varchar(11) NOT NULL,
  `pathology_chromogranin` varchar(11) NOT NULL,
  `pathology_hmb45` varchar(11) NOT NULL,
  `pathology_notes` varchar(200) NOT NULL,
  PRIMARY KEY (`pathology_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;

INSERT INTO pathology VALUES("43","42","21","2018-02-16","Negative","Negative","Negative","Negative","Negative","Negative","Negative","sasda"); 



DROP TABLE patient;

CREATE TABLE `patient` (
  `patient_ID` int(5) NOT NULL AUTO_INCREMENT,
  `patient_firstName` varchar(15) NOT NULL,
  `patient_lastName` varchar(15) NOT NULL,
  `patient_address` varchar(30) NOT NULL,
  `patient_contactNumber` varchar(15) NOT NULL,
  `patient_bloodType` varchar(5) NOT NULL,
  `patient_Age` int(5) NOT NULL,
  `patient_Name` varchar(30) NOT NULL,
  `patient_time` varchar(15) NOT NULL,
  `patient_LMP` date NOT NULL,
  `month` char(3) NOT NULL,
  `year` char(4) NOT NULL,
  PRIMARY KEY (`patient_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

INSERT INTO patient VALUES("9","Grace","Nessia","Prk. Kasilingan","2147483647","O+","40","Grace Nessia","","2017-10-15","Oct","2017"); 
INSERT INTO patient VALUES("12","Miriam","Gayoba","hinigaran city","2147483647","AB+","30","Miriam Gayoba","","2018-01-04","Jan","2018"); 
INSERT INTO patient VALUES("18","josepha","doromal","bacolod","15551212","O+","27","joseph doromal","","2018-02-04","Feb","2018"); 
INSERT INTO patient VALUES("21","honey","villa","talisay","991275352","B-","20","honey villa","","2018-02-05","Feb","2018"); 
INSERT INTO patient VALUES("22","Nina","Garcia","Hinigaran","09123457890","O+","21","Nina Garcia","","2017-12-04","Feb","2018"); 
INSERT INTO patient VALUES("23","Nina Lynn","Sarrosa","Bacolod City","09451597562","A+","32","Nina Lynn Sarrosa","","2017-11-06","Jan","2018"); 
INSERT INTO patient VALUES("24","Smergin","Sombilla","Handumanan","09101234567","O+","35","Smergin Sombilla","","2017-10-08","Jan","2017"); 
INSERT INTO patient VALUES("25","anita","delapaz","silay","0999382712","B+","23","anita delapaz","1:00 am","2017-11-06","Nov","2017"); 
INSERT INTO patient VALUES("26","vincenta","suyo","bago city","0999387232","O+","18","vincenta suyo","1:00 am","2017-11-20","Nov","2017"); 
INSERT INTO patient VALUES("27","Myra Jill","Pabion","Brgy. Bato","09167901591","A+","0","Myra Jill Pabion","1:00 am","2018-01-01","Jan","2018"); 
INSERT INTO patient VALUES("28","Myra Mae","Gayoba","Hinigaran","09123457800","A+","20","Myra Mae Gayoba","1:00 am","2018-01-09","Jan","2018"); 
INSERT INTO patient VALUES("29","Maria Marie","Garcia","Bacolod","0999223123","B+","32","Maria Marie Garcia","1:00 am","2018-02-01","Feb","2018"); 
INSERT INTO patient VALUES("30","Kathleen","Dinsay","Bacolod City","09101234567","A+","25","Kathleen Dinsay","1:00 am","2018-02-01","Feb","2018"); 
INSERT INTO patient VALUES("31","Angelica","Jaranilla","Bacolod City","09123456789","B+","30","Angelica Jaranilla","1:00 am","2018-02-02","Feb","2018"); 
INSERT INTO patient VALUES("32","raphaeila","sleepy","bacolod","12345689","B-","21","raphaeila sleepy","1:00 am","2018-01-04","Feb","2018"); 



DROP TABLE patientcheckup;

CREATE TABLE `patientcheckup` (
  `pc_ID` int(5) NOT NULL AUTO_INCREMENT,
  `patient_ID` int(5) NOT NULL,
  `sched_ID` int(5) NOT NULL,
  `pc_weight` int(5) NOT NULL,
  `pc_date` date NOT NULL,
  `pc_diagnosis` varchar(255) NOT NULL,
  `pc_bloodPressure` varchar(10) NOT NULL,
  `pc_problems` varchar(255) NOT NULL,
  `pc_month` varchar(10) NOT NULL,
  `pc_year` varchar(15) NOT NULL,
  PRIMARY KEY (`pc_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

INSERT INTO patientcheckup VALUES("25","9","30","50","2018-02-12","Chronic Villus,Gestational Diabetes","120/140","None","Feb","2018"); 
INSERT INTO patientcheckup VALUES("26","18","32","50","2018-02-12","Chronic Villus,Gestational Diabetes","120/90","None","Feb","2018"); 
INSERT INTO patientcheckup VALUES("27","31","33","45","2018-02-12","Chronic Villus","120/80","Chronic","Feb","2018"); 
INSERT INTO patientcheckup VALUES("28","12","37","56","2018-02-15","Tay-Sachs Disease","190/120","tay-sachs","Feb","2018"); 
INSERT INTO patientcheckup VALUES("29","21","0","1","2018-02-17","Chronic Villus","123/211","asd","Feb","2018"); 
INSERT INTO patientcheckup VALUES("30","30","47","123","2018-02-18","Chronic Villus","123/23","asd","Feb","2018"); 



DROP TABLE prescription;

CREATE TABLE `prescription` (
  `presc_ID` int(5) NOT NULL AUTO_INCREMENT,
  `pc_ID` int(5) NOT NULL,
  `patient_ID` int(5) NOT NULL,
  `presc_medicines` varchar(30) NOT NULL,
  `presc_dosage` varchar(15) NOT NULL,
  `presc_frequency` varchar(15) NOT NULL,
  PRIMARY KEY (`presc_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

INSERT INTO prescription VALUES("6","27","31","Decolgen","250","2"); 
INSERT INTO prescription VALUES("7","28","12","Decolgen","24","2"); 
INSERT INTO prescription VALUES("8","28","12","Tempra","2","2"); 



DROP TABLE schedule;

CREATE TABLE `schedule` (
  `sched_ID` int(11) NOT NULL AUTO_INCREMENT,
  `patient_ID` int(11) NOT NULL,
  `sched_Date` date NOT NULL,
  `sched_Time` time NOT NULL,
  `sched_status` varchar(10) NOT NULL,
  `month` char(3) NOT NULL,
  `year` char(4) NOT NULL,
  PRIMARY KEY (`sched_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=latin1;

INSERT INTO schedule VALUES("30","9","2018-02-12","01:02:00","","Feb","2018"); 
INSERT INTO schedule VALUES("31","12","2018-02-12","01:05:00","","Feb","2018"); 
INSERT INTO schedule VALUES("32","18","2018-02-12","01:05:00","","Feb","2018"); 
INSERT INTO schedule VALUES("33","31","2018-02-12","09:00:00","","Feb","2018"); 
INSERT INTO schedule VALUES("34","27","2018-02-12","08:00:00","","Feb","2018"); 
INSERT INTO schedule VALUES("35","9","2018-02-13","12:00:00","","Feb","2018"); 
INSERT INTO schedule VALUES("37","12","2018-02-15","01:00:00","","Feb","2018"); 
INSERT INTO schedule VALUES("38","31","2018-02-16","12:00:00","","Feb","2018"); 
INSERT INTO schedule VALUES("39","30","2018-02-17","05:00:00","","Feb","2018"); 
INSERT INTO schedule VALUES("40","27","2018-02-17","11:00:00","","Feb","2018"); 
INSERT INTO schedule VALUES("41","26","2018-02-24","03:00:00","","Feb","2018"); 
INSERT INTO schedule VALUES("42","21","2018-02-17","05:00:00","","Feb","2018"); 
INSERT INTO schedule VALUES("43","21","2018-02-20","12:00:00","","Feb","2018"); 
INSERT INTO schedule VALUES("44","18","2018-02-22","12:00:00","","Feb","2018"); 
INSERT INTO schedule VALUES("45","9","2018-02-24","12:00:00","","Feb","2018"); 
INSERT INTO schedule VALUES("47","30","2018-02-19","12:55:00","","Feb","2018"); 
INSERT INTO schedule VALUES("48","21","2018-03-06","06:00:00","","Mar","2018"); 
INSERT INTO schedule VALUES("49","26","2018-03-06","06:00:00","","Mar","2018"); 
INSERT INTO schedule VALUES("51","26","2018-02-23","12:00:00","","Feb","2018"); 
INSERT INTO schedule VALUES("53","28","2018-02-21","04:00:00","","Feb","2018"); 
INSERT INTO schedule VALUES("54","26","2018-02-22","12:35:00","","Feb","2018"); 
INSERT INTO schedule VALUES("57","31","2018-02-18","12:00:00","","Feb","2018"); 
INSERT INTO schedule VALUES("58","18","2018-03-06","01:00:00","","Feb","2018"); 
INSERT INTO schedule VALUES("59","29","2018-02-24","11:55:00","","Feb","2018"); 
INSERT INTO schedule VALUES("60","32","0000-00-00","01:00:00","","",""); 
INSERT INTO schedule VALUES("62","32","2018-02-27","01:00:00","","Feb","2018"); 
INSERT INTO schedule VALUES("63","32","2018-02-15","01:00:00","","Feb","2018"); 



DROP TABLE staff;

CREATE TABLE `staff` (
  `staff_ID` int(5) NOT NULL AUTO_INCREMENT,
  `staff_fname` varchar(15) NOT NULL,
  `staff_lname` varchar(15) NOT NULL,
  `staff_contactNumber` int(12) NOT NULL,
  `staff_address` varchar(30) NOT NULL,
  `staff_gender` varchar(10) NOT NULL,
  `staff_bdate` date NOT NULL,
  `staff_position` varchar(10) NOT NULL,
  PRIMARY KEY (`staff_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

INSERT INTO staff VALUES("10","Brix Rodman ","Nessia  ","112244556","bago city  ","Male","1980-02-06","Secretary"); 



DROP TABLE transaction;

CREATE TABLE `transaction` (
  `trans_id` int(11) NOT NULL AUTO_INCREMENT,
  `trans_type` varchar(15) NOT NULL,
  `trans_date` date NOT NULL,
  `trans_patientid` int(11) NOT NULL,
  PRIMARY KEY (`trans_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

INSERT INTO transaction VALUES("2","Schedule","2001-02-15","25"); 
INSERT INTO transaction VALUES("3","Schedule","2018-02-16","28"); 
INSERT INTO transaction VALUES("4","Schedule","2018-02-16","26"); 
INSERT INTO transaction VALUES("5","Pathology","2018-02-16","21"); 
INSERT INTO transaction VALUES("6","Hematology","2018-02-16","21"); 
INSERT INTO transaction VALUES("7","Ultrasound","2018-02-16","30"); 
INSERT INTO transaction VALUES("8","Urinalysis","2018-02-16","30"); 
INSERT INTO transaction VALUES("9","X-Ray","2018-02-16","0"); 



DROP TABLE ultrasound;

CREATE TABLE `ultrasound` (
  `ultra_id` int(5) NOT NULL AUTO_INCREMENT,
  `sched_ID` int(5) NOT NULL,
  `patient_ID` int(5) NOT NULL,
  `ultra_date` date NOT NULL,
  `ultra_reason` varchar(255) NOT NULL,
  `ultra_fetusQty` int(11) NOT NULL,
  `ultra_biparietalDiameter` int(11) NOT NULL,
  `ultra_occiDiameter` int(11) NOT NULL,
  `ultra_abdominal` int(11) NOT NULL,
  `ultra_fetalHeart` int(11) NOT NULL,
  `ultra_distalFemoral` int(11) NOT NULL,
  `ultra_femoralLenght` int(11) NOT NULL,
  `ultra_headCircumference` int(11) NOT NULL,
  `ultra_headCircumferenceWeek` int(11) NOT NULL,
  `ultra_estimatedFetal` int(11) NOT NULL,
  `ultra_hadlock` int(11) NOT NULL,
  `ultra_warsof` int(11) NOT NULL,
  `ultra_amonioticFluid1` int(11) NOT NULL,
  `ultra_amonioticFluid2` int(11) NOT NULL,
  `ultra_amonioticFluid3` int(11) NOT NULL,
  `ultra_amonioticFluid4` int(11) NOT NULL,
  `ultra_cervical` int(11) NOT NULL,
  `ultra_cervicalDesc` varchar(255) NOT NULL,
  `ultra_fetalTone` int(11) NOT NULL,
  `ultra_fetalMovement` int(11) NOT NULL,
  `ultra_fetalBreathing` int(11) NOT NULL,
  `ultra_biophysicalProfile` int(11) NOT NULL,
  `ultra_other` varchar(255) NOT NULL,
  `ultra_remark` varchar(255) NOT NULL,
  `ultra_genweeks` int(11) NOT NULL,
  `comp_miscarriage` smallint(6) NOT NULL,
  `comp_premature` smallint(6) NOT NULL,
  `comp_preclampsia` smallint(6) NOT NULL,
  `comp_chromosal` smallint(6) NOT NULL,
  `comp_oligohydra` smallint(6) NOT NULL,
  `comp_ectopic` smallint(6) NOT NULL,
  `comp_placenta` smallint(6) NOT NULL,
  `year` char(4) NOT NULL,
  PRIMARY KEY (`ultra_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

INSERT INTO ultrasound VALUES("3","37","12","2018-02-15","1","1","1","1","1","1","1","1","1","0","1","1","1","1","1","1","1","1","1","0","1","11","1","1","1","6","1","0","0","0","0","0","0","2018"); 
INSERT INTO ultrasound VALUES("4","38","31","2018-02-15","sample","2","23","23","23","23","23","23","23","0","23","12","12","12","12","12","23","23","23","23","123","123","10","sample","sample","2","0","1","0","0","0","0","0","2018"); 
INSERT INTO ultrasound VALUES("5","38","31","2018-02-16","sample","1","123","123","123","312","123","123","123","0","123","123","123","0","0","0","0","123","123","123","123","123","9","123","123","2","0","0","1","0","0","1","0","2018"); 
INSERT INTO ultrasound VALUES("6","39","30","2018-02-16","sample","2","12","123","123","123","123","123","132","0","123","12","12","123","123","123","123","123","123","123","123","123","3","123","123","2","0","0","0","0","0","1","0","2018"); 
INSERT INTO ultrasound VALUES("8","39","30","2018-02-16","asd","1","123","123","123","123","123","123","123","0","123","123","123","123","123","123","123","123","123","123","123","123","1","123","123","2","1","0","0","0","0","0","0","2018"); 



DROP TABLE urinalysis;

CREATE TABLE `urinalysis` (
  `uri_ID` int(11) NOT NULL AUTO_INCREMENT,
  `sched_ID` int(5) NOT NULL,
  `patient_ID` int(5) NOT NULL,
  `uri_date` date NOT NULL,
  `uri_color` varchar(11) NOT NULL,
  `uri_transparency` varchar(11) NOT NULL,
  `uri_pH` int(11) NOT NULL,
  `uri_specificGravity` int(11) NOT NULL,
  `uri_sugar` int(11) NOT NULL,
  `uri_protein` int(11) NOT NULL,
  `uri_MICtransparency` varchar(11) NOT NULL,
  `uri_MICpH` int(11) NOT NULL,
  `uri_MICspecificGravity` int(11) NOT NULL,
  PRIMARY KEY (`uri_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO urinalysis VALUES("2","39","30","2018-02-16","Blue","Blue","23","23","23","12","Red","23","12"); 



DROP TABLE users;

CREATE TABLE `users` (
  `user_ID` int(5) NOT NULL AUTO_INCREMENT,
  `staff_ID` int(5) NOT NULL,
  `user_userName` varchar(15) NOT NULL,
  `user_password` varchar(15) NOT NULL,
  `user_type` varchar(10) NOT NULL,
  PRIMARY KEY (`user_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

INSERT INTO users VALUES("6","0","admin","admin","admin"); 
INSERT INTO users VALUES("7","10","doctor","doctor","doctor"); 



DROP TABLE xray;

CREATE TABLE `xray` (
  `xray_ID` int(5) NOT NULL AUTO_INCREMENT,
  `sched_ID` int(5) NOT NULL,
  `patient_ID` int(5) NOT NULL,
  `xray_date` date NOT NULL,
  `xray_impression` varchar(255) NOT NULL,
  `xray_remark` varchar(255) NOT NULL,
  PRIMARY KEY (`xray_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO xray VALUES("1","42","0","2018-02-16","asd","asd"); 
INSERT INTO xray VALUES("2","42","0","2018-02-16","asd","asd"); 



