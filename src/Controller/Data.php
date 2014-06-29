<?php

namespace AppName\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use AppName\Model\Data as DataModel;

class Data {
	function get(\Silex\Application $app, Request $request, $dataId = null){

		if($dataId === null){

			$conditions = array(
				'username = ?',
				$app['current_username']
			);

			$datas = DataModel::all(array('conditions'=>$conditions));
			$output = array();
			foreach($datas as $data){
				$output[] = $data->attributes();
			}
		}else{
			$output = DataModel::find_by_id($dataId)->attributes();
		}

		return $app->json($output);
	}

	function post(\Silex\Application $app, Request $request){

		$new_data = $request->request->all();

		$new_data['username'] = $app['current_username'];

		$data = DataModel::create($new_data);
		$data->save();

		return $app->json($data->attributes());
	}

	function put(\Silex\Application $app, Request $request, $dataId = null){
		if($dataId === null && is_array($request->request->all())){
			$return = array();

			foreach($request->request->all() as $data_attr){
				$data = DataModel::find_by_id($data_attr['id']);
				$data->set_attributes($data_attr);
				$data->username = $app['current_username'];
				$data->save();
				
				$return[] = $data->attributes();
			}
			return $app->json($return);
		}else{
			$data = DataModel::find_by_id($dataId);

			$new_data = $request->request->all();
			$new_data['username'] = $app['current_username'];

			$data->set_attributes($new_data);

			$data->save();

			return $app->json($data->attributes());
		}

	}

	function delete(\Silex\Application $app, $dataId = null){
		$data = DataModel::find_by_id($dataId);
		$data->delete();

		return $app->json($data->attributes());
	}
}
