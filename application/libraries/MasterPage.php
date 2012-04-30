<?php if ( ! defined ( 'BASEPATH' ) ) exit ( 'No direct script access allowed.' );
/**
 * @author Kim Johansson <hagbarddenstore@gmail.com>
 * @copyright Copyright (c) 2008, Kim Johansson
 *
 * @version 0.0.1
 */
class MasterPage {
    private $masterPage = '';
    private $contentPages = array ( );
    private $ci = null;

    /**
     * @access public
     * @param string $masterPage Optional file to use as MasterPage.
     */
    public function __construct ( $masterPage = '' ) {
        $this->CI = get_instance ( );
        if ( ! empty ( $masterPage ) )
            $this->setMasterPage ( $masterPage );
    }

    /**
     * @access public
     * @param string $masterPage File to use as MasterPage.
     */
    public function setMasterPage ( $masterPage ) {
        // Check if the supplied masterpage exists.
        if ( ! file_exists ( APPPATH . 'views/' . $masterPage . EXT ) )
            throw new Exception ( APPPATH . 'views/' . $masterPage . EXT );
        $this->masterPage = $masterPage;
    }

    /**
     * @access public
     * @return string The current MasterPage.
     */
    public function getMasterPage ( ) {
        return $this->masterPage;
    }

    /**
     * @access public
     * @param string $file The view file to add.
     * @param string $tag The tag in the MasterPage it should match.
     * @param mixed $content The content to be used in the view file.
     */
    public function content ( $file, $tag, $content = array ( ) ) {
        $this->contentPages[$tag] = $this->CI->load->view ( $file, $content, true );
		return $this;
    }

    /**
     * @access public
     * @param array $content Optional content to be added to the MasterPage.
     */
    public function show ( $content = array ( ) ) {
        // Get the content of the MasterPage and replace all matching tags with their
        // respective view file content.
        $masterPage = $this->CI->load->view ( $this->masterPage, $content, true );
        foreach ( $this->contentPages as $tag => $content ) {
            $masterPage = str_replace ( '<mp:' . ucfirst ( strtolower ( $tag ) ) . ' />',
            $content, $masterPage );
        }
		
		$masterPage = preg_replace('/<mp:.*? \/>/i', '', $masterPage);

        // Finally, print the data.
        echo $masterPage;
    }
}