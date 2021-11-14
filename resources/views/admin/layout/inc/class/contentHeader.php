<?php 

	class contentHeader
	{
		
		function __construct()
		{
			// code...
		}

		public static function getContentHeader($title= 'Dashboard', $title2 = 'Home')
		{
			return "
				    <div class='content-header'>
				      <div class='container-fluid'>
				        <div class='row mb-2'>
				          <div class='col-sm-6'>
				            <h1 class='m-0'>$title</h1>
				          </div>
				          <div class='col-sm-6'>
				            <ol class='breadcrumb float-sm-right'>
				              <li class='breadcrumb-item'><a href='/admin/'>Dashboard</a></li>
				              <li class='breadcrumb-item active'>$title2</li>
				            </ol>
				          </div>
				        </div>
				      </div>
				    </div>";
		}
	}
 ?>