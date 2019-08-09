{
	"info": {
		"_postman_id": "413785d9-8736-4388-9fb4-078b96976dc3",
		"name": "E-LOAN MOTOR",
		"schema": "https://schema.getpostman.com/json/collection/v2.1.0/collection.json"
	},
	"item": [
		{
			"name": "Client",
			"item": [
				{
					"name": "update customer details",
					"request": {
						"method": "POST",
						"header": [],
						"body": {
							"mode": "formdata",
							"formdata": [
								{
									"key": "identity",
									"value": "11929883993003",
									"type": "text"
								},
								{
									"key": "fname",
									"value": "Kwizera",
									"type": "text"
								},
								{
									"key": "lname",
									"value": "Emmizo",
									"type": "text"
								},
								{
									"key": "tel",
									"value": "0730072621",
									"type": "text"
								},
								{
									"key": "email",
									"value": "emmizokwizera@gmail.com",
									"type": "text"
								},
								{
									"key": "birthyear",
									"value": "1999",
									"type": "text"
								}
							]
						},
						"url": {
							"raw": "localhost/e-loan/update_client.php",
							"host": [
								"localhost"
							],
							"path": [
								"e-loan",
								"update_client.php"
							]
						},
						"description": "input/ client identity(client will update their information according to his/her identity)\n\noutput/\nget status show him/her that update have been successfull or not"
					},
					"response": []
				},
				{
					"name": "apply for motor loan",
					"request": {
						"method": "POST",
						"header": [],
						"body": {
							"mode": "formdata",
							"formdata": [
								{
									"key": "identity2",
									"value": "11929883993003",
									"type": "text"
								},
								{
									"key": "VIN2",
									"value": "455445KLM",
									"type": "text"
								},
								{
									"key": "payID",
									"value": "8",
									"type": "text"
								},
								{
									"key": "insuranceID",
									"value": "1",
									"type": "text"
								}
							]
						},
						"url": {
							"raw": "localhost/e-loan/apply.php",
							"host": [
								"localhost"
							],
							"path": [
								"e-loan",
								"apply.php"
							]
						},
						"description": "input/ \nDetail of motor what he/she want to loan and startegy will use in paying and insurance"
					},
					"response": []
				},
				{
					"name": "all motors available",
					"request": {
						"method": "POST",
						"header": [],
						"url": {
							"raw": "localhost/e-loan/MotorAvailable.php",
							"host": [
								"localhost"
							],
							"path": [
								"e-loan",
								"MotorAvailable.php"
							]
						},
						"description": "This API will show you all motors available\nyou may use it when client going to apply for loan motor\nNB: this API you may use it in ADMIN if you want,"
					},
					"response": []
				},
				{
					"name": "checking balance rest on each motors",
					"request": {
						"method": "POST",
						"header": [],
						"body": {
							"mode": "formdata",
							"formdata": [
								{
									"key": "identity2",
									"value": "11929883993003",
									"type": "text"
								}
							]
						},
						"url": {
							"raw": "localhost/e-loan/checkBalance.php",
							"host": [
								"localhost"
							],
							"path": [
								"e-loan",
								"checkBalance.php"
							]
						},
						"description": "input/\nidentity and motor id\noutput/\nshow money you paid and money you rest to pay"
					},
					"response": []
				},
				{
					"name": "paying API",
					"request": {
						"method": "POST",
						"header": [],
						"body": {
							"mode": "formdata",
							"formdata": [
								{
									"key": "identity2",
									"value": "11929883993003",
									"type": "text"
								},
								{
									"key": "VIN2",
									"value": "455445KLM",
									"type": "text"
								},
								{
									"key": "paidMoney",
									"value": "433333.3333333333",
									"type": "text"
								}
							]
						},
						"url": {
							"raw": "localhost/e-loan/pay.php",
							"host": [
								"localhost"
							],
							"path": [
								"e-loan",
								"pay.php"
							]
						},
						"description": "input/\nclient identity\nmotor id\nthen money you pay\noutput/\noperation status"
					},
					"response": []
				},
				{
					"name": "create new client(sign in)",
					"request": {
						"method": "POST",
						"header": [],
						"body": {
							"mode": "formdata",
							"formdata": [
								{
									"key": "identity",
									"value": "11920993993838",
									"type": "text"
								},
								{
									"key": "fname",
									"value": "Niyonzima",
									"type": "text"
								},
								{
									"key": "lname",
									"value": "Felix",
									"type": "text"
								},
								{
									"key": "tel",
									"value": "0781167285",
									"type": "text"
								},
								{
									"key": "email",
									"value": "niyofelix@gmail.com",
									"type": "text"
								},
								{
									"key": "birthyear",
									"value": "1998",
									"type": "text"
								},
								{
									"key": "username",
									"value": "Felix",
									"type": "text"
								},
								{
									"key": "password",
									"value": "Felix",
									"type": "text"
								}
							]
						},
						"url": {
							"raw": "localhost/e-loan/sign_in.php",
							"host": [
								"localhost"
							],
							"path": [
								"e-loan",
								"sign_in.php"
							]
						},
						"description": "input/\nclient details\noutput/\noperation status"
					},
					"response": []
				},
				{
					"name": "update client information",
					"request": {
						"method": "POST",
						"header": [],
						"body": {
							"mode": "formdata",
							"formdata": [
								{
									"key": "identity",
									"value": "11929883993003",
									"type": "text"
								},
								{
									"key": "fname",
									"value": "Emmizo",
									"type": "text"
								},
								{
									"key": "lname",
									"value": "Kwizera",
									"type": "text"
								},
								{
									"key": "tel",
									"value": "078118383",
									"type": "text"
								},
								{
									"key": "email",
									"value": "emmizokwizera@gmail.com",
									"type": "text"
								},
								{
									"key": "birthyear",
									"value": "1991",
									"type": "text"
								},
								{
									"key": "username",
									"value": "Emmizo",
									"type": "text"
								},
								{
									"key": "password",
									"value": "Kwizera23",
									"type": "text"
								}
							]
						},
						"url": {
							"raw": "localhost/e-loan/update_client.php",
							"host": [
								"localhost"
							],
							"path": [
								"e-loan",
								"update_client.php"
							]
						},
						"description": "input/\nidentity\nNB:(update will be according to identity of client in his/her account which passed in localstorage as you know how to use it)\n\noutput/\noperation status"
					},
					"response": []
				},
				{
					"name": "check all motor you loan",
					"request": {
						"method": "POST",
						"header": [],
						"body": {
							"mode": "formdata",
							"formdata": [
								{
									"key": "identity2",
									"value": "11929883993003",
									"type": "text"
								}
							]
						},
						"url": {
							"raw": "localhost/e-loan/checkAllBallance.php",
							"host": [
								"localhost"
							],
							"path": [
								"e-loan",
								"checkAllBallance.php"
							]
						},
						"description": "input/\nidentity of customer\noutput/\ninfo of all motor he/she loan with money paid and rest"
					},
					"response": []
				},
				{
					"name": "view all motors you got",
					"request": {
						"method": "POST",
						"header": [],
						"body": {
							"mode": "formdata",
							"formdata": [
								{
									"key": "identity2",
									"value": "11929883993003",
									"type": "text"
								}
							]
						},
						"url": {
							"raw": "localhost/e-loan/motorYouLoan.php",
							"host": [
								"localhost"
							],
							"path": [
								"e-loan",
								"motorYouLoan.php"
							]
						},
						"description": "input/\nidentity\noutput/\nview all motors you got"
					},
					"response": []
				},
				{
					"name": "view client information",
					"request": {
						"method": "POST",
						"header": [],
						"body": {
							"mode": "formdata",
							"formdata": [
								{
									"key": "identity",
									"value": "11920993993838",
									"type": "text"
								}
							]
						},
						"url": {
							"raw": "localhost/e-loan/EachClientInfo.php",
							"host": [
								"localhost"
							],
							"path": [
								"e-loan",
								"EachClientInfo.php"
							]
						},
						"description": "input/\nidentity\noutput/\nclient detail with operation status"
					},
					"response": []
				},
				{
					"name": "This API is for clients which will help in checking all transaction occured on his/her account",
					"request": {
						"method": "POST",
						"header": [],
						"body": {
							"mode": "formdata",
							"formdata": [
								{
									"key": "identity2",
									"value": "11929883993003",
									"type": "text"
								}
							]
						},
						"url": {
							"raw": "localhost/e-loan/report.php",
							"host": [
								"localhost"
							],
							"path": [
								"e-loan",
								"report.php"
							]
						},
						"description": "input/\nidentity of client\noutput/\nall transation happened on his account"
					},
					"response": []
				},
				{
					"name": "API for Changing password ",
					"request": {
						"method": "POST",
						"header": [],
						"body": {
							"mode": "formdata",
							"formdata": [
								{
									"key": "oldPassword",
									"value": "Kwizera23",
									"type": "text"
								},
								{
									"key": "password",
									"value": "Kwizera23",
									"type": "text"
								},
								{
									"key": "identity2",
									"value": "11920993993838",
									"type": "text"
								}
							]
						},
						"url": {
							"raw": "localhost/e-loan/changePassword.php",
							"host": [
								"localhost"
							],
							"path": [
								"e-loan",
								"changePassword.php"
							]
						},
						"description": "input/\nidentity and oldpassword\noutput/\noperation status"
					},
					"response": []
				},
				{
					"name": "Login for client",
					"request": {
						"method": "POST",
						"header": [],
						"body": {
							"mode": "formdata",
							"formdata": [
								{
									"key": "username",
									"value": "Felix",
									"type": "text"
								},
								{
									"key": "password",
									"value": "Kwizera25",
									"type": "text"
								}
							]
						},
						"url": {
							"raw": "localhost/e-loan/loginClient.php",
							"host": [
								"localhost"
							],
							"path": [
								"e-loan",
								"loginClient.php"
							]
						},
						"description": "input/\nusername and password\noutput/\nidentityn and client name"
					},
					"response": []
				}
			],
			"description": "This folder contain API for only clients"
		},
		{
			"name": "Admin",
			"item": [
				{
					"name": "view all motors taken and available",
					"request": {
						"method": "POST",
						"header": [],
						"url": {
							"raw": "localhost/e-loan/SelectMotor.php",
							"host": [
								"localhost"
							],
							"path": [
								"e-loan",
								"SelectMotor.php"
							]
						},
						"description": "output/\nview all motors taken and available"
					},
					"response": []
				},
				{
					"name": "all motor taken with clients who taken that",
					"request": {
						"method": "POST",
						"header": [],
						"url": {
							"raw": "localhost/e-loan/MotorTaken.php",
							"host": [
								"localhost"
							],
							"path": [
								"e-loan",
								"MotorTaken.php"
							]
						},
						"description": "select all motor taken with clients who taken that,with money he/she paid and money he/she rest to pay\noutput/\noperation status"
					},
					"response": []
				},
				{
					"name": "create insurance",
					"request": {
						"method": "POST",
						"header": [],
						"body": {
							"mode": "formdata",
							"formdata": [
								{
									"key": "insurance",
									"value": "",
									"type": "text"
								},
								{
									"key": "percentage",
									"value": "",
									"type": "text"
								}
							]
						},
						"url": {
							"raw": "localhost/e-loan/AddInsurance.php",
							"host": [
								"localhost"
							],
							"path": [
								"e-loan",
								"AddInsurance.php"
							]
						},
						"description": "input/\ninsurance details\noutput/\noperation status"
					},
					"response": []
				},
				{
					"name": "select all client available in one pay period ",
					"request": {
						"method": "POST",
						"header": [],
						"body": {
							"mode": "formdata",
							"formdata": [
								{
									"key": "payID",
									"value": "8",
									"type": "text"
								}
							]
						},
						"url": {
							"raw": "localhost/e-loan/StarategyPayClient.php",
							"host": [
								"localhost"
							],
							"path": [
								"e-loan",
								"StarategyPayClient.php"
							]
						},
						"description": "input/\npayment id\noutput/\nview all client available which are assigned to pay in that period"
					},
					"response": []
				},
				{
					"name": "client choose to use  one insurance",
					"request": {
						"method": "POST",
						"header": [],
						"body": {
							"mode": "formdata",
							"formdata": [
								{
									"key": "insuranceID",
									"value": "2",
									"type": "text"
								}
							]
						},
						"url": {
							"raw": "localhost/e-loan/ViewCLientInsurance.php",
							"host": [
								"localhost"
							],
							"path": [
								"e-loan",
								"ViewCLientInsurance.php"
							]
						},
						"description": "input/ \ninsurance id\noutput/\nview all clients use that insurance"
					},
					"response": []
				},
				{
					"name": "view all client",
					"request": {
						"method": "POST",
						"header": [],
						"url": {
							"raw": "localhost/e-loan/SelectClient.php",
							"host": [
								"localhost"
							],
							"path": [
								"e-loan",
								"SelectClient.php"
							]
						},
						"description": "output/\noperation status\n"
					},
					"response": []
				},
				{
					"name": "add new motor",
					"request": {
						"method": "POST",
						"header": [],
						"body": {
							"mode": "formdata",
							"formdata": [
								{
									"key": "VIN",
									"value": "K849DKF",
									"type": "text"
								},
								{
									"key": "model",
									"value": "TVS",
									"type": "text"
								},
								{
									"key": "value",
									"value": "2000000",
									"type": "text"
								}
							]
						},
						"url": {
							"raw": "localhost/e-loan/addMotor.php",
							"host": [
								"localhost"
							],
							"path": [
								"e-loan",
								"addMotor.php"
							]
						},
						"description": "Input/\nMotor Details\noutput/\nOperation Status"
					},
					"response": []
				},
				{
					"name": "update insurance",
					"request": {
						"method": "POST",
						"header": [],
						"body": {
							"mode": "formdata",
							"formdata": [
								{
									"key": "insuranceID",
									"value": "14",
									"type": "text"
								},
								{
									"key": "insurance",
									"value": "Radiant",
									"type": "text"
								},
								{
									"key": "percentage",
									"value": "12",
									"type": "text"
								}
							]
						},
						"url": {
							"raw": "localhost/e-loan/updateInsurance.php",
							"host": [
								"localhost"
							],
							"path": [
								"e-loan",
								"updateInsurance.php"
							]
						},
						"description": "input/\ninsurance id,\nNB: update will be according to insurance id\noutput/\nstatus operation"
					},
					"response": []
				},
				{
					"name": "update motor",
					"request": {
						"method": "POST",
						"header": [],
						"body": {
							"mode": "formdata",
							"formdata": [
								{
									"key": "id",
									"value": "2",
									"type": "text"
								},
								{
									"key": "VIN",
									"value": "K849DKF",
									"type": "text"
								},
								{
									"key": "model",
									"value": "TVS",
									"type": "text"
								},
								{
									"key": "value",
									"value": "2000000",
									"type": "text"
								}
							]
						},
						"url": {
							"raw": "localhost/e-loan/updateMotor.php",
							"host": [
								"localhost"
							],
							"path": [
								"e-loan",
								"updateMotor.php"
							]
						},
						"description": "input/ \nidentity of motor(VIN)\noutput/\noperation status\n"
					},
					"response": []
				},
				{
					"name": "Create admin",
					"request": {
						"method": "POST",
						"header": [],
						"body": {
							"mode": "formdata",
							"formdata": [
								{
									"key": "username",
									"value": "Kwizera",
									"type": "text"
								},
								{
									"key": "password",
									"value": "Kwizera23",
									"type": "text"
								}
							]
						},
						"url": {
							"raw": "localhost/e-loan/addAdmin.php",
							"host": [
								"localhost"
							],
							"path": [
								"e-loan",
								"addAdmin.php"
							]
						},
						"description": "input/\nadmin username and password"
					},
					"response": []
				},
				{
					"name": "changing password for admin",
					"request": {
						"method": "POST",
						"header": [],
						"body": {
							"mode": "formdata",
							"formdata": [
								{
									"key": "oldPassword",
									"value": "Kwizer23",
									"type": "text"
								},
								{
									"key": "password",
									"value": "Kwizera25",
									"type": "text"
								},
								{
									"key": "id",
									"value": "4",
									"type": "text"
								}
							]
						},
						"url": {
							"raw": "localhost/e-loan/changePasswordAdmin.php",
							"host": [
								"localhost"
							],
							"path": [
								"e-loan",
								"changePasswordAdmin.php"
							]
						},
						"description": "input/\noldpassword\nand new password\noutput/\noperation status"
					},
					"response": []
				}
			],
			"description": "This folder contain API for only Admin"
		}
	]
}