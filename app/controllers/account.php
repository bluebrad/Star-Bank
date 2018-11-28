<?

class account extends Controller
{
	public function index()
	{
		
		$this->checkIsLoggedIn();
		$this->checkToggle();
		$accountModel = $this->model('AccountModel');
		$account = $accountModel->getAccountsByUserId($_SESSION['login_id']);

		$this->view('account/accountSummary',
			['acc_toggle' => $_SESSION['acc_toggle'],
			 'accounts' => $account]);
	}

	public function new()
	{
		$this->checkIsLoggedIn();
		$this->checkOpenAccountData();
		$accountModel = $this->model('AccountModel');
		$accountType = $accountModel->getAccountType();
		$accountOption = $accountModel->getAccountOptions();
		$accountService = $accountModel->getAccountService();
		$this->view('account/openAccount',
			['accounttype' => $accountType,
			'accountoptions' => $accountOption,
			'accountservice' => $accountService]
		);
	}

	public function details($account_id)
	{
		$this->checkIsLoggedIn();

		$accountModel = $this->model('AccountModel');
		$account = $accountModel->getAccountById($account_id);
		//var_dump($account);
		$transactionModel = $this->model('TransactionModel');
		$transactions = $transactionModel->getTransactionByAccountId($account_id);
		//var_dump($transactions);
		$annualProfits =0;

		 //Arbitrary value (NEED QUERY TO COMPUTE ANNUAL LOSSES)
	//	 var_dump($transactionModel->getAccountLoss($account_id));
		for($index = 0; $index < count($transactionModel->getAccountLoss($account_id)); $index++){
			$annualLosses += $transactionModel->getAccountLoss($account_id)[$index];
		}
		$this->view('account/accountDetails',
			['account' => $account,
			 'transactions' => $transactions,
		     'annualProfits' => $annualProfits,
		     'annualLosses' => $annualLosses]);
	}

	public function checkToggle()
	{
		if(isset($_POST['toggle']) && $this->validateOpenAccountData())
		{
			if($_POST['toggle'] == 'Personal')
				$_SESSION['acc_toggle'] = 'Personal';
			else //$_POST['toggle'] == 'Business'
				$_SESSION['acc_toggle'] = 'Business';
		}
	}

	public function checkOpenAccountData()
	{
		if(isset($_POST['openaccount']) && $this->validateOpenAccountData())
		{
			if($_SESSION['login_type'] == 'Client')
			{
				//NEED CREATE ACCOUNT QUERY (FOR CLIENT)
			}
			else //$_SESSION['login_type'] == 'Employee'
			{
				//NEED CREATE ACCOUNT QUERY (FOR EMPLOYEE)
			}

			header("Location:/account");
		}
	}

	public function validateOpenAccountData()
	{
		//INSERT VALIDATION (AS NEEDED)

		return true;
	}
}

?>
