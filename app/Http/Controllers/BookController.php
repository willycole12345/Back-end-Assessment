<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Http\Requests\Booksvalidation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class BookController extends Controller
{
 public function external_books(Request $request){
        $response= array();
        $data=[];
       $name=$request->name;
        if( empty ($name)){
            $response['status_code']="404";
            $response['Status']="not found";
            $response['data']=array();
        }else{
            $request_param= array(
                'name'=>$name
            );
            $req='GET';
            $server ="https://www.anapioficeandfire.com/api/books";
            $rtn= $this->sendAPIPOSTRequest( $request_param , $req , $server , $payload = '');
            $json_record=json_decode($rtn);
           // var_dump($json);

          if(empty($json_record)) {
            $response['status_code']="404";
            $response['Status']="not found";
            $response['data']=array();
          

          }else{
            //   var_dump($json_record);
              foreach ($json_record as $json) {

                    $data = array(
                        'name'=> $json->name,
                        'isbn'=> $json->isbn, 
                        'authors'=> [$json->authors[0]],
                        'numberOfPages'=>$json->numberOfPages,
                        'publisher'=> $json->publisher,
                        'country'=> $json->country,
                        'mediaType'=>$json->mediaType,
                        'released'=>$json->released
                    );
        
                }
            $response['status_code']='200';
            $response['status']="success";
            $response['data']= [
                $data
            ];
          }
    
          echo json_encode($response);

        }
    
    }

    public function create (Request $request){
                $response=array();
            if( empty($request->name) || empty($request->isbn)||empty($request->authors)|| empty($request->number_of_page)
            || empty($request->publisher)||empty($request->country)|| empty($request->release_date)){
                     
                    $response = [
                        'status_code' => '404',
                        'Status' => 'not found',
                        'data'=>[],
                    ];
            }else{
            // var_dump( $request->all());
                $record= $request->all();
                $create_book = Book::create($record);
            if($create_book){
                    $rec =  $create_book;
                    $response =[
                        'status_code' => '200',
                        'status' => '',
                        'data'=>['book' => [
                            'name'=> $rec->name,
                            'isbn'=> $rec->isbn, 
                            'authors'=> [$rec->authors],
                            'number_of_page'=>$rec->number_of_page,
                            'publisher'=> $rec->publisher,
                            'country'=> $rec->country,
                            'release_date'=>$rec->release_date
                        ]]
                    
                    ];

                }else{

                    $response = [
                        'status_code' => '404',
                        'Status' => 'not found',
                        'data'=>[],
                    ];  

                }
            
                echo json_encode($response);

        }
    }

    public function Get_book($record_data=""){

            $response=array();
            if(empty($record_data)){
                        $data="";
                        $record=Book::all();
                        $res = [];
                        foreach($record as $key => $rec){
                            $res[$key] = [
                                'name'=> $rec->name,
                                'isbn'=> $rec->isbn, 
                                'authors'=> [$rec->authors],
                                'number_of_page'=>$rec->number_of_page,
                                'publisher'=> $rec->publisher,
                                'country'=> $rec->country,
                                'release_date'=>$rec->release_date
                            ];
                        }
                        $response = [
                            'status_code' => '200',
                            'Status' => 'successs',
                            'data' => [$res],
                        ];  
            }else{
                $result=DB::table('book')->select('*')
                                ->where('name', 'LIKE', "%{$record_data}%")
                                ->orwhere('publisher', 'LIKE', "%{$record_data}%")
                                ->orwhere('country', 'LIKE', "%{$record_data}%")
                                ->orwhere('release_date', 'LIKE', "%{$record_data}%")
                                ->get();

                                foreach($result as $key => $rec){
                                    $res[$key] = [
                                        'name'=> $rec->name,
                                        'isbn'=> $rec->isbn, 
                                        'authors'=> [$rec->authors],
                                        'number_of_page'=>$rec->number_of_page,
                                        'publisher'=> $rec->publisher,
                                        'country'=> $rec->country,
                                        'release_date'=>$rec->release_date
                                    ];
                                }
                                $response = [
                                    'status_code' => '200',
                                    'Status' => 'successs',
                                    'data' => [$res],
                                ];     
                }

                echo json_encode($response);

        }

        public function Update(Request $request, $id){

                    if(empty($request)){
                        $response =[
                            'status_code' => '404',
                            'status' => '',
                        ];
                    }
                        $update_book = Book::where('id',$id)
                        ->update(['name' => $request->name,'isbn' => $request->isbn,
                        'authors' => $request->authors,
                        'number_of_page' => $request->number_of_page,
                        'publisher' => $request->publisher,
                        'country' => $request->country,
                        'release_date' => $request->release_date]);
                    // var_dump($update_book);
                        if(!$update_book){
                            $response =[
                                'status_code' => '404',
                                'status' => 'Not Found',
                                'data' => [],
                            ];
                        }else{
                    
                        $result=DB::table('book')->select('*')->where('id',$id)->get();
                    //   var_dump($result);
                        $response =[
                            'status_code' => '200',
                            'status' => $result[0]->name.' '."updated successfully",
                            'data'=>['book' => [
                                'name'=> $result[0]->name,
                                'isbn'=> $result[0]->isbn, 
                                'authors'=> [$result[0]->authors],
                                'number_of_page'=>$result[0]->number_of_page,
                                'publisher'=> $result[0]->publisher,
                                'country'=> $result[0]->country,
                                'release_date'=>$result[0]->release_date
                            ]]
                        
                        ];

                    }

                    echo json_encode($response);
                }

            public function Delete($id){
                $response= array();
                $result=DB::table('book')->select('*')->where('id',$id)->get();

                if(empty($record[0])){
                    $response =[
                        'status_code' => '404',
                        'status' => "not found",
                        'data'=>[]
                    ];
                }else{
                    $book_deleted = Book::where('id', $id)->delete();
                    if(!$book_deleted){
                        $response =[
                            'status_code' => '404',
                            'status' => $result[0]->name."  not deleted",
                            'data'=>[]
                        
                        ];
                    }else{
                        $response =[
                            'status_code' => '204',
                            'status' => $result[0]->name." has been deleted successfully",
                            'data'=>[]
                        
                        ];
                    }
                
               
                }
            echo json_encode($response);
            }
            public function Show($id){
                $response= array();
                $result=DB::table('book')->select('*')->where('id',$id)->get();
                 //var_dump($result);
                if(!$result){
                   
                          $response =[
                            'status_code' => '404',
                            'status' => "not found",
                            'data'=>[]
                            
                        ];
            
                }else{
                    if(empty($result[0])){
                        $response =[
                            'status_code' => '404',
                            'status' => "not found",
                            'data'=>[]
                            
                        ];
            
                    }else{
                    $response =[
                        'status_code' => '200',
                        'status' =>"success",
                        'data' => [
                            'id'=>$result[0]->id,
                            'name'=> $result[0]->name,
                            'isbn'=> $result[0]->isbn, 
                            'authors'=> [$result[0]->authors],
                            'number_of_page'=>$result[0]->number_of_page,
                            'publisher'=> $result[0]->publisher,
                            'country'=> $result[0]->country,
                            'release_date'=>$result[0]->release_date
                       ]
                    
                    ];
                   }     
                }
            echo json_encode($response);
            }

            public function sendAPIPOSTRequest( $request_param , $req , $server , $payload = '' , $custom_hdr = array() )
            {
                // echo '<br>'.'URL Called: '.$server.'<br>' ;
                // echo '<br>'.'Sha1: '.sha1('sa123').'<br>' ;
            
                $post_vars = '' ;
            
                if ((!empty($request_param))  && is_array( $request_param ) )
                {
                    $post_vars = http_build_query( $request_param ); 
                }
            
                //var_dump($post_vars) ;
            
                $headers = array(
                                //   "Content-length: ".(strlen($request_param)+strlen($payload)),
                                    "Accept: application/json",
                                    "Connection: open",
                                );
            
                        if ( $req == 'POST'){
                                        
                            $contenttype = ((!$payload)? ' application/x-www-form-urlencoded':  ' application/json') ;
                        
                            $headers = array(
                            "Content-length: ".(strlen($payload) + strlen($post_vars) ) , 
                            "Content-Type:".$contenttype ,			
                            "Accept: application/json",
                            );
                        }
            
                    $headers = ( (empty($custom_hdr)) ? $headers : $custom_hdr );
            
                //	$this->debug_vardump($headers) ;
            
                $ch = curl_init();
            
                //$ch = curl_init();
            
                curl_setopt($ch, CURLOPT_URL, $server);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);     // Not needed and counter productive
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
                curl_setopt($ch, CURLOPT_TIMEOUT, 500);
                curl_setopt($ch,CURLOPT_ENCODING , "") ;
                curl_setopt($ch,CURLOPT_MAXREDIRS , 10) ;
            
                $posteds = ($req  === 'POST') ? true : false ;
                curl_setopt($ch, CURLOPT_POST, $posteds )   ;
                if ($posteds) curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            
                $bodyofreq = ( (($payload !== '') || ($post_vars !== '')) ? true : false ) ;
                
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                if ( $bodyofreq ) curl_setopt($ch, CURLOPT_POSTFIELDS, $post_vars.$payload );
            
                $arr_logs =  [] ;
                $return_dumps  = '' ;
                $return_stat  = '' ;
                $dataout = [];
                
                $yy = false ;
                
                //var_dump('where is this coming from ');
                $data = curl_exec($ch);
                
            if(curl_errno($ch)){
                    // print curl_error($ch);
            
                // echo "  something went wrong..... try later";
                    $error_arr = array('status' => false ,
                                        'errormecode' => '99',        
                                        'errormessage' => curl_error($ch) ,
                                        'url' => $server 
                                        ) ;
                                        
                    $data = json_encode( $error_arr ) ;
                    $return_stat  = 'Socket Error: Failed' ;
                    $return_dumps = $data ;          // json_encode($dataout) ;
                    
                    curl_close($ch);  	
                    
                }else{
                    
            
                    $yy = true ;
                    $return_stat  = 'completed successfully' ;	
                    $return_dumps =  $data ;
                    
                    curl_close($ch);  		
            
                }
                
                    $data_out = $data ;
                    
                return $data_out ;
            
                }
        }
