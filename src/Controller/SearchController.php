<?php

namespace App\Controller;

class SearchController extends AppController
{
    public function index()
    {
        if ($this->request->is('post')) {
            $aws_access_key_id = AWS_ACCESS_KEY_ID;
            $aws_secret_key = AWS_SECRET_KEY;
            $AssociateTag = ASSOCIATE_TAG;
            $word = $_POST['result'];
            $page = $_POST['page'];

            //URL生成
            $endpoint = 'webservices.amazon.co.jp';
            $uri = '/onca/xml';

            //パラメータ群
            $params = array(
                'Service' => 'AWSECommerceService',
                'Operation' => 'ItemSearch',
                'AWSAccessKeyId' => $aws_access_key_id,
                'AssociateTag' => $AssociateTag,
                'SearchIndex' => 'Books',
                'ResponseGroup' => 'Medium',
                'Keywords' => $word,
                'ItemPage' => $page
            );

            //timestamp
            if (!isset($params['Timestamp'])) {
                $params['Timestamp'] = gmdate('Y-m-d\TH:i:s\Z');
            }

            //パラメータをソート
            ksort($params);

            $pairs = array();
            foreach ($params as $key => $value) {
                array_push($pairs, rawurlencode($key).'='.rawurlencode($value));
            }

            //リクエストURLを生成
            $canonical_query_string = join('&', $pairs);
            $string_to_sign = "GET\n".$endpoint."\n".$uri."\n".$canonical_query_string;
            $signature = base64_encode(hash_hmac('sha256', $string_to_sign, $aws_secret_key, true));
            $request_url = 'http://'.$endpoint.$uri.'?'.$canonical_query_string.'&Signature='.rawurlencode($signature);

            $amazon_xml = simplexml_load_string(@file_get_contents($request_url));//@はエラー回避
            $this->set(compact('amazon_xml'));
            $this->set(compact('word'));
        }
    }
}
