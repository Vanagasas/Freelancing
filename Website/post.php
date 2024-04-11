<?php 
    include_once 'dbc.php';
	require_once 'post-form.php';
?>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="postStyle.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Alata&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="postScript.js"></script>
</head>
<body>

    <main>
        <div class="content">
            <div class="post-text">
                <h1>Provide the details about the project</h1>
                <p>To ensure the best candidates, provide the most accurate information for the project as possible</p>
            </div>
            <div class="project-information">
                <form action="post.php" id="post-form" method="post">
                    <div class="nested-input">
                        <label class="project-label">Project name</label>
                        <p class="note error error-name">Project name is required</p>
                        <input class="project-input project-name-input" name="project-name" type="text">
                    </div>
                    <div class="nested-input">
                        <label class="project-label">Details about the project</label>
                        <p class="note error error-details">Project details is required</p>
                        <textarea type="text" class="project-input project-details-input" rows="5" name="project-details"></textarea>
                    </div>
                    <div class="nested-input">
                        <label class="project-label">Project category</label>
                        <select name="categories" id="category">
                            <option value="applications">Applications</option>
                            <option value="designs">Designs</option>
                            <option value="illustrations">Illustrations</option>
                            <option value="software">Software</option>
                            <option value="website">Website</option>
                            <option value="writing">Writing</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                    <div class="nested-input">
                        <label class="project-label">Project type</label>
                        <select name="spec" id="category">
                            <option value="i">Individual project</option>
                            <option value="t">Team up request</option>
                            <option value="l">Learning request</option>
                        </select>
                    </div>
                    <div class="nested-input">
                        <label class="project-label">Price</label>
                        <p class="note">Note: For user convinence all values taken as an american dollar currency</p>
                        <div class="payment-methods">
                            <p class="note error error-price">Project price is required</p>
                            <div class="payment-suggestion one-input" name="payment-one-first" value=""><input name="param-one-first" value="" type="hidden"/>
                                <p>Fixed payment</p>
                            </div>
                            <div class="payment-suggestion one-input" name="payment-one-second" value=""><input name="param-one-second" value="" type="hidden"/>
                                <p>Fixed hourly payment</p>
                            </div>
                            <div class="payment-suggestion two-input" name="payment-two-first" value=""><input name="param-two-first" value="" type="hidden"/>
                                <p>Bid payment range</p>
                            </div>
                            <div class="payment-suggestion two-input" name="payment-two-second" value=""><input name="param-two-second" value="" type="hidden"/>
                                <p>Bid payment hourly range</p>
                            </div>
                            <div class="payment-suggestion none" name="none" value=""><input name="none" value="" type="hidden"/>
                                <p>None</p>
                            </div>
                        </div>
                        <div class="one-type-input">
                            <input name="fixed" class="project-input project-price-single-input" placeholder="Fixed price"/>
                        </div>
                        <div class="two-type-input">
                            <input name="bid-min" class="project-input project-double-first-input type-two" placeholder="Min"/>
                            <input name="bid-max" class="project-input project-double-second-input type-two" placeholder="Max"/>
                        </div>
                    </div>
                    <div class="nested-input">
                        <label class="project-label">Skills required</label>
                        <p class="note error error-skills">At least 1 skill is required</p>
                        <div class="selected-skills"></div>
                        <div class="skill-container">
                            <input class="project-input skill-input">
                            <button type="button" class="add-skill-button">Add</button>
                        </div>
                    </div>
                    
                    <button type="submit" name="form-button" class="post-button">Post a project</button>
                </form>
            </div>
        </div>
    </main>
    
</body>


</html>