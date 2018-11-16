<?

class ClientModel
{
	public $table = 'Client';
	public $clients;

	private $data = 
	'{
		"Client" : [{
			"client_id" : 1,
			"branch_id" : 1,
			"first_name" : "First1",
			"last_name" : "Last1",
			"street_address" : "Address1",
			"password" : "Password1",
			"join_date" : "2018-01-11",
			"department" : "Department1",
			"email" : "Email1",
			"phone" : 1111111111
		}, {
			"client_id" : 2,
			"branch_id" : 2,
			"first_name" : "First2",
			"last_name" : "Last2",
			"street_address" : "Address2",
			"password" : "Password2",
			"join_date" : "2018-02-12",
			"department" : "Department2",
			"email" : "Email2",
			"phone" : 2222222222
		}, {
			"client_id" : 3,
			"branch_id" : 3,
			"first_name" : "First3",
			"last_name" : "Last3",
			"street_address" : "Address3",
			"password" : "Password3",
			"join_date" : "2018-03-13",
			"department" : "Department3",
			"email" : "Email3",
			"phone" : 3333333333
		}]
	}';

	function __construct()
	{
		$this->clients = json_decode($this->data)->Client;
	}
}

?>