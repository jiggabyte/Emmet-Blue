CREATE SCHEMA Mortuary;
GO

CREATE TABLE Mortuary.Body (
	BodyID INTEGER PRIMARY KEY IDENTITY,
	BodyTag VARCHAR(50) NOT NULL,
	DateOfDeath DATE NOT NULL,
	TimeOfDeath TIME NOT NULL,
	PlaceOfDeath VARCHAR(100) NOT NULL,
	BurialPlace VARCHAR(100),
	DeathPhysicianName VARCHAR(20),
	DeathPhysicianID INTEGER 
)
GO

CREATE TABLE Mortuary.BodyInformation (
	BodyInformationID INTEGER PRIMARY KEY IDENTITY,
	BodyID INTEGER,
	BodyFirstName VARCHAR(20) NOT NULL,
	BodyLastName VARCHAR(20),
	BodyMiddleName VARCHAR(20),
	BodyDateOfBirth DATETIME,
	BodyGender VARCHAR(10) NOT NULL,
	BodyPlaceOfBirth VARCHAR(100),
	FamilyMemberRelationshipType VARCHAR(20) NOT NULL,
	FamilyMemberGender VARCHAR(10) NOT NULL,
	FamilyMemberName VARCHAR(50) NOT NULL,
	FamilyMemberPhoneNumber VARCHAR(20),
	FOREIGN KEY (BodyID) REFERENCES Mortuary.Body(BodyID) ON UPDATE CASCADE ON DELETE CASCADE
)
GO