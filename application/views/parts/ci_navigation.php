<div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                
                    <li <?php echo ($cur_url[4]=="welcome") ? 'class="active"' : ''?>>
                        <a href="/ci_admin/welcome"><i class="fa fa-fw fa-dashboard"></i> მთავარი გვერდი</a>
                    </li>
                    <li <?php echo ($cur_url[4]=="categories") ? 'class="active"' : ''?>>
                        <a href="/ci_admin/categories"><i class="fa fa-fw fa-list"></i> კატეგორია</a>
                    </li>
                     <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#permi"><i class="fa fa-fw fa-ban"></i> ვებ გვერდის ნებართვა</a>
                        <ul id="permi" class="collapse">
                            <li>
                                <a href="#">მაგიდა</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#commerce"><i class="fa fa-fw fa-file-text"></i> რეკლამა</a>
                        <ul id="commerce" class="collapse">
                            <li>
                                <a href="#">მაგიდა</a>
                            </li>
                             <li>
                                <a href="#">რეკლამის დამატება</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#users"><i class="fa fa-fw fa-users"></i> მომხმარებელი</a>
                        <ul id="users" class="collapse">
                            <li>
                                <a href="#">მაგიდა</a>
                            </li>
                             <li>
                                <a href="#">დაბლოკილი მომხმარებლები</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#cont"><i class="fa fa-fw fa-envelope"></i> კონტაქტი</a>
                        <ul id="cont" class="collapse">
                            <li>
                                <a href="#">მაგიდა</a>
                            </li>
                             <li>
                                <a href="#">გაგზავნა</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>