<?php
                $query = "select * from users";
                $get_all_users = mysqli_query($connection,$query);
                $users_count = mysqli_num_rows($get_all_users);
                        
                
                $query = "select * from category";
                $get_all_categories = mysqli_query($connection,$query);
                $category_count = mysqli_num_rows($get_categories);
                
                
                $query = "select * from products";
                $get_all_products = mysqli_query($connection,$query);
                $products_count = mysqli_num_rows($get_all_products);
                
                
                $query = "select * from orders";
                $get_all_orders = mysqli_query($connection,$query);
                $orders_count = mysqli_num_rows($get_all_orders);
                
                $query = "select * from admin";
                $get_all_admins = mysqli_query($connection,$query);
                $admins_count = mysqli_num_rows($get_all_admins);
                
                ?>
                
                <div class="row visible-xl" style="overflow-x:auto;">
                    <div class="col-12">
                    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                    <script type="text/javascript">
                          google.charts.load('current', {'packages':['bar']});
                          google.charts.setOnLoadCallback(drawChart);

                          function drawChart() {
                            var data = google.visualization.arrayToDataTable([
                              ['Data', 'Count'],
                                
                                <?php     
                                
                                $data_items = ['All Users','All Categories','All Products','All Orders','All Admins'];   //In the x axis
                                $data_values = [$users_count,$category_count,$products_count,$orders_count,$admins_count];//In the y axis
                                
                                for($i = 0;$i < count($data_items); $i++)   //Loop through each array
                                {
                                    echo "['$data_items[$i]',"."$data_values[$i]],";
                                }
                                
                                
                                ?>
                                
                            ]);

                            var options = {
                              chart: {
                                title: '',
                                subtitle: '',
                              }
                            };

                            var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

                            chart.draw(data, google.charts.Bar.convertOptions(options));
                          }
                    </script>
                   
                   
                  <div id="columnchart_material" style="width: 'auto'; height: 400px;"></div>
                    
                    
                    
                  </div>
                    
                </div>