<?php
	class Investment extends CI_Controller {
		public function __construct(){
			parent::__construct();
			$this->load->helper(array(
				'url'
			));
            $this->load->database();
		}
		#打开招商页面
		public function index(){
			$data['js'] = $this->getProvinceCity_js();
			$this->load->view('Investment',$data);
		}
    /**
     * 所有省市联动下拉js
     */
    public function getProvinceCity_js(){
        $sql = "select dist_id,name,level,pinyin,pre_dist_id from province_city  ";
        $query = $this->db->query($sql);
        $list = array();
        while ($row = $query->unbuffered_row('array')) {
            if($row['level']==1){
                $list[$row['dist_id']] = array('name'=>$row['name']);
            }elseif($row['level']==2){
                $list[$row['pre_dist_id']][$row['dist_id']]['name']= $row['name'];
                $list[$row['pre_dist_id']][$row['dist_id']]['pinyin']= $row['pinyin'];
            }
        }

        foreach ($list as $k => $v){
            foreach ($v as $k1 => $v1) {
                if($k1!='name'){
                    $city.='{
                        "ct": "'.$v1['name'].'",
                        "cv": "'.$k1.'"
                    },';
                }
            }
            $list_js.='{
            "p": "'.$v['name'].'",
            "v": "'.$k.'",
            "c": [
                '.$city.'
            ]
        },';
            $city='';
        }

            $js='
                $(function() {
                    var list = [
                        '.$list_js.'
                    ];
                    var pro = $(\'#province\');
                    var city = $(\'#city\');
                    var proDiv = $(\'#proDiv\');
                    var cityDiv = $(\'#cityDiv\');
                    var index=0;
                    var divhtml2=\'\';
                    var cityhtml=\'\';
                    var proFun = function () {
                        var prohtml = \'\';
                        $.each(list, function (k, v) {
                            //prohtml+= "<option value=\'"+v.p+"\'>"+v.p+"</option>";
                            prohtml += "<a href=\'javascript:void(0);\' data-pro=\'"+v.v+"\' class=\'list-group-item\'>" + v.p + "</a>";
                        });
                        pro.html(prohtml);
                        //初始化省份、城市------------------------------------
                        var divhtml = proDiv.html() + "<span class=\'text\'>"+list[0].p+"</span>";
                        proDiv.html(divhtml);
                        console.log(proDiv.html());
                    };
                
                    var cityFun=function(){
                        cityhtml=\'\';
                        $.each(list[index].c,function(k,v){
                            cityhtml+= "<a href=\'javascript:void(0);\' data-city=\'"+v.cv+"\' class=\'list-group-item citya\'>" + v.ct + "</a>";
                        });
                        city.html(cityhtml);
                        cityDiv.parent().find(\'span.text\').eq(0).text(list[index].c[0].ct);
                        console.log(cityDiv.html());
                
                    };
                    proFun();
                    cityFun();
                
                  $(\'span.xl\').click(function(){
                      $(this).parent().find(\'ul\').toggle();
                      //$(\'#province\').toggle();
                  });
                    $(document).bind("click", function (e) {
                        var target = $(e.target);
                        if(target.closest("#province,#proDiv").length == 0){
                            //进入if则表明点击的不是#province,#proDiv元素中的一个
                            $("#province").hide();
                        }if(target.closest("#city,#cityDiv").length == 0){
                            //进入if则表明点击的不是#province,#proDiv元素中的一个
                            $("#city").hide();
                        }
                        e.stopPropagation();
                    });
        $(\'#province a\').click(function(){
            $(\'#proDiv span.text\').text($(this).text());
            $(\'#province\').hide();
            index=$(this).index();
            cityFun();
            $(\'#pro_id\').val($(this).data("pro"));
            $(\'#city_id\').val($("body").find(".citya").eq(0).data("city"));

        });
            $(document).on(\'click\',\'.citya\', function() {
                cityDiv.parent().find(\'span.text\').eq(0).text($(this).text());
                $(\'#city\').hide();
                $(\'#city_id\').val($(this).data("city"));

            });
        });
        ';
            return $js;
        }
	}
?>