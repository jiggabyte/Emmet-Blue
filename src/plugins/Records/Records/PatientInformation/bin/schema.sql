
GO
CREATE TABLE Records.Patient(
PatientID INT(10) PRIMARY KEY IDENTITY,
Title VARCHAR(10) NOT NULL,
FirstName VARCHAR(60) NOT NULL,
MiddleName VARCHAR(29) NULL,
LastName VARCHAR(60) NOT NULL,
Gender VARCHAR(60) NOT NULL,
DateOfBirth VARCHAR(10) NOT NULL,
Occupation VARCHAR (60) NOT NULL,
PatientType VARCHAR(60) NOT NULL,
)

GO
CREATE TABLE Records.PatientAddressInformation(
AddressID INT(10) PRIMARY KEY IDENTITY,
PatientID INTEGER,
PhoneNumber VARCHAR(60),
Email VARCHAR(60),
Address VARCHAR(60) NOT NULL,
StateOfResidence VARCHAR(60) NOT NULL,
Nationality VARCHAR(60) NOT NULL,
StateOfOrigin VARCHAR(29) NULL,
LGA VARCHAR(60) NOT NULL,
FOREIGN KEY (PatientID) REFERENCES Records.Patient(PatientID) ON UPDATE CASCADE ON DELETE CASCADE
)
GO
CREATE TABLE Records.NextOfKinIformation(
NextOfKinID INT(10) PRIMARY KEY IDENTITY,
PatientID INTEGER,
NextOfKinFullname VARCHAR(60),
NextOfKinAddress VARCHAR(60) NOT NULL,
State VARCHAR(60) NOT NULL,
Nationality VARCHAR(60) NOT NULL,
FOREIGN KEY (PatientID) REFERENCES Records.Patient(PatientID) ON UPDATE CASCADE ON DELETE CASCADE
)
CREATE TABLE Records.PatientFormerHealthProvider(

)