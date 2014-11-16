<div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                
                    <li <?php echo ($cur_url[4]=="welcome") ? 'class="active"' : ''?>>
                        <a href="/ci_admin/welcome"><i class="fa fa-fw fa-dashboard"></i> მთავარი გვერდი</a>
                    </li>
                    <li <?php echo ($cur_url[4]=="categories") ? 'class="active"' : ''?>>
                        <a href="/ci_admin/categories"><i class="fa fa-fw fa-list"></i> კატეგორია</a>
                    </li>
                     <li <?php echo ($cur_url[4]=="websites") ? 'class="active"' : ''?>>
                        <a href="/ci_admin/websites"><i class="fa fa-fw fa-chain"></i> ვებ გვერდები</a>
                    </li>
                    <li <?php echo ($cur_url[4]=="webusers") ? 'class="active"' : ''?>>
                        <a href="/ci_admin/webusers"><i class="fa fa-fw fa-users"></i> მომხმარებელი</a>
                    </li>
                    <li>
                        <a href="javascript:;"><i class="fa fa-fw fa-file-text"></i> რეკლამა</a>
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