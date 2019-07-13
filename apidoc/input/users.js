/**
 * @api {get} users?page=1&q=yopmail&sortby=first_name&direction=asc Get all users list
 * @apiName GetUsers
 * @apiGroup Users
 *
 * @apiParam {Number} page Users page number.
 * @apiParam {String} q search keyword.
 * @apiParam {String} sortby field name for sorting.
 * @apiParam {String} direction sorting direction like asc or desc.
 *
 * @apiSuccess {Number} id ID of the User.
 * @apiSuccess {Number} role_id  Role of the User.
 * @apiSuccess {String} email  Email ID of the User.
 * @apiSuccess {String} first_name  First name of the User.
 * @apiSuccess {String} last_name  Last name of the User.
 * @apiSuccess {Datetime} created_at  Date created of the User.
 * @apiSuccess {Datetime} updated_at  Date modified of the User.
 *
 * @apiSuccessExample Success-Response:
HTTP/1.1 200 OK
{
	"current_page": 1,
	"data": [
		{
			"id": 17,
			"role_id": 2,
			"email": "ayush@yopmail.com",
			"first_name": "Ayush",
			"last_name": "Kumar",
			"status": 1,
			"created_at": "2018-08-04 17:51:49",
			"updated_at": "2018-08-04 17:51:49",
			"full_name": "Ayush Kumar",
			"role": {
				"id": 2,
				"role": "User",
				"status": 1,
				"created_at": "2018-07-30 17:09:37",
				"updated_at": "2018-07-30 17:09:37"
			}
		},
		{
			"id": 1,
			"role_id": 2,
			"email": "krishan.mohan@yopmail.com",
			"first_name": "Krishan",
			"last_name": "Mohan",
			"status": 0,
			"created_at": "2018-08-04 11:05:21",
			"updated_at": "2018-08-04 11:05:21",
			"full_name": "Krishan Mohan",
			"role": {
				"id": 2,
				"role": "User",
				"status": 1,
				"created_at": "2018-07-30 17:09:37",
				"updated_at": "2018-07-30 17:09:37"
			}
		}
	],
	"first_page_url": "http:\/\/apis.justapp.com\/api\/v1\/users?page=1",
	"from": 1,
	"last_page": 12,
	"last_page_url": "http:\/\/apis.justapp.com\/api\/v1\/users?page=12",
	"next_page_url": "http:\/\/apis.justapp.com\/api\/v1\/users?page=2",
	"path": "http:\/\/apis.justapp.com\/api\/v1\/users",
	"per_page": 2,
	"prev_page_url": null,
	"to": 2,
	"total": 24
}
 */


/**
 * @api {post} users Create a new user
 * @apiName CreateUser
 * @apiGroup Users
 *
 * @apiParam {String} first_name First name of the user.
 * @apiParam {String} last_name Last name of the user.
 * @apiParam {String} email Email of the user.
 * @apiParam {String} password Password of the user.
 *
 * @apiParamExample {json} Request-Example:
 * {
 * 	  "first_name": "Manjeet",
 *	  "last_name": "Singh",
 *	  "email": "manjeet1@yopmail.com",
 *	  "password": "User@123"
 * }
 *
 *
 * @apiSuccess {Number} id ID of the User.
 * @apiSuccess {Number} role_id  Role of the User.
 * @apiSuccess {String} email  Email ID of the User.
 * @apiSuccess {String} first_name  First name of the User.
 * @apiSuccess {String} last_name  Last name of the User.
 * @apiSuccess {Datetime} created_at  Date created of the User.
 * @apiSuccess {Datetime} updated_at  Date modified of the User.
 *
 * @apiSuccessExample Success-Response:
 HTTP/1.1 200 OK
 {
	"success": true,
	"data": {
		"first_name": "Manjeet",
		"last_name": "Singh",
		"email": "manjeet1@yopmail.com",
		"role_id": 2,
		"status": 1,
		"updated_at": "2018-09-02 17:40:47",
		"created_at": "2018-09-02 17:40:47",
		"id": 21
	},
	"message": "User created successfully."
}
 *
 *
 * @apiErrorExample Error-Response:
 HTTP/1.1 422 Unprocessable Entity
 {
	"message": "The given data was invalid.",
	"errors": {
		"email": [
			"The email has already been taken."
		]
	}
}
 *
 *
 */