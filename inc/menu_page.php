<?php
/**
 * This is template file for the
 * page which opens when received messages
 * tab in wp dashboard is clicked
 */

 require_once ('delete_messages.php');
?>
<h1>Received Messages</h1>

<?php
global $wpdb;
    $table_name = $wpdb->prefix . 'messages';
    $count_query = "select count(*) from $table_name";
    $num = $wpdb->get_var($count_query);
?>
<div style='display:flex; width: 99%;'>
    <h4>Total Messages are : <span style='font-weight: light;'><?php esc_html_e( $num, 'save-messages-in-dashboard' ); ?></span> </h4> 

    
    <form method='post' style='margin-left: auto;'>
        <input type="submit" class='delete-all-messages' name='delete' value="Delete All Messages">
    </form>

</div>
<?php
    global $wpdb;
    
    $table_name = $wpdb->prefix . "messages";
    // this will get the data from your table
    $retrieve_data = $wpdb->get_results( "SELECT * FROM $table_name" );
?>
<table  class="wp-list-table widefat  striped table-view-list pages" style='width: 99%;'>

<thead>
        <tr>

            <th scope="col" id="author" class="manage-column column-author">
                ID
            </th>
            
            <th scope="col" id="title" class="manage-column column-title column-primary sortable desc">
                <p style='padding: 8px;'>
                    <span>Name</span>
                    <!--<span class="sorting-indicator"></span> -->
                </p>
            </th>

            <th scope="col" id="author" class="manage-column column-author">
                Subject
            </th>

            <th scope="col" id="author" class="manage-column column-author">
                Email
            </th>
            
            <th scope="col" id="author" class="manage-column column-author">
                Message
            </th>
            
          
            
            <th scope="col" id="date" class="manage-column column-date sortable asc">
                <p style='padding: 8px;' href="#">
                    <span>Date/Day</span>
                   
                </p>
            </th>

            <th scope="col" id="author" class="manage-column column-author">
                Delete Message
            </th>


        </tr>
	</thead>

    

<tbody id="the-list">
<?php
    foreach ($retrieve_data as $retrieved_data){ ?>
<tr id="post-21" class="iedit author-self level-0 post-21 type-page status-publish hentry">

    <td class="author column-author">
            <p>
                 <?php $id = $retrieved_data->id;?>
                 <?php esc_html_e( $retrieved_data->id, 'save-messages-in-dashboard' ); ?>
            </p>
    </td>
    
    <td class="title column-title has-row-actions column-primary page-title">
            <p>
                <?php esc_html_e( $retrieved_data->name, 'save-messages-in-dashboard' ); ?>
            </p>
    </td>
    
    <td class="author column-author">
            <p>
                <?php esc_html_e( $retrieved_data->subject, 'save-messages-in-dashboard' ); ?>
            </p>
    </td>

    <td class="author column-author">
            <p> 
                <?php esc_html_e( $retrieved_data->email, 'save-messages-in-dashboard' ); ?>
            </p>
    </td>

    <td class="author column-author">
            <p>
                <?php esc_html_e( $retrieved_data->message, 'save-messages-in-dashboard' ); ?>
            </p>
    </td>
    
    <td class="date column-date">
        <!--2022/05/05 at 6:56 pm--> 
        <?php esc_html_e( $retrieved_data->date_added, 'save-messages-in-dashboard' ); ?>
    </td>		

    <td class="author column-author">
        
        <form method='get' action='<?php $id = $retrieved_data->id; ?>'>
            Click To Delete :  <input type="submit" name='id' class='delete-message' value="<?php esc_html_e( $retrieved_data->id, 'save-messages-in-dashboard' ); ?>">
        </form>
        
    </td>

    

</tr>
<?php 
        }
    ?>
</tbody>

    
</table>



   