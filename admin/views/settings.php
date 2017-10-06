<div class="wrap">

    <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>

    <form method="post" action="<?php echo esc_html( admin_url( 'admin-post.php' ) ); ?>">

        <div id="add-user-instructions-container">
        <h2>Add User Instructions</h2>

        <div class="options">
            <table>
            <tr>
                <td>Header for internal users:</td>
                <td><input type='text' value="<?php echo esc_attr( $this->deserializer->get_value( 'ecds-add-internal-user-instructions-header' ) ); ?>" /></td>
            </tr>
            <tr>
                <td>Instructions to add internal users:</td>
                <td><textarea name="internal-instructions"><?php echo esc_attr( $this->deserializer->get_value( 'ecds-add-internal-user-instructions' ) ); ?></textarea></td>
            </tr>
                <td>Header for external users:</td>
                <td><input type='text' value="<?php echo esc_attr( $this->deserializer->get_value( 'ecds-add-external-user-instructions-header' ) ); ?>" /></td>
            </tr>
            <tr>
                <td>Instructions to add external users:</td>
                <td><textarea name="external-instructions"><?php echo esc_attr( $this->deserializer->get_value( 'ecds-add-external-user-instructions' ) ); ?></textarea></td>
            </tr>
            </table>
        </div>
        <?php
            wp_nonce_field( 'ecds-add-user-instructions-save', 'ecds-add-user-instructions' );
            submit_button();
        ?>
    </form>

</div>
