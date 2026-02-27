<?php
/**
 * Class CoreTest
 *
 * @package WPALLSTARS\PluginStarterTemplate
 */

use WPALLSTARS\PluginStarterTemplate\Core;

/**
 * Core test case.
 */
class CoreTest extends \WP_Mock\Tools\TestCase {

    /**
     * Test instance
     *
     * @var Core
     */
    private $core;

    /**
     * Set up test environment
     */
    public function setUp(): void {
        parent::setUp();

        // Set up mocks
        WP_Mock::setUp();

        // Create instance of Core class
        $this->core = new Core();
    }

    /**
     * Tear down test environment
     */
    public function tearDown(): void {
        WP_Mock::tearDown();
        parent::tearDown();
    }

    /**
     * Test constructor
     */
    public function test_constructor() {
        // Verify that the constructor initializes hooks
        $this->assertInstanceOf(Core::class, $this->core);
    }

    /**
     * Test example method
     */
    public function test_filter_content() {
        $content = '<div class="notice"><p>Test content</p></div>';

        // Test that filter_content returns the content
        $this->assertEqualHTML( $content, $this->core->filter_content( $content ) );
    }

    /**
     * Compare HTML using WordPress helper when available, otherwise normalize.
     *
     * @param string $expected Expected HTML.
     * @param string $actual Actual HTML.
     * @return void
     */
    protected function assertEqualHTML( $expected, $actual ) {
        if ( is_callable( [ get_parent_class( $this ), 'assertEqualHTML' ] ) ) {
            parent::assertEqualHTML( $expected, $actual );
            return;
        }

        $normalize = static function ( $html ) {
            return preg_replace( '~>\s+<~', '><', trim( (string) $html ) );
        };

        $this->assertSame( $normalize( $expected ), $normalize( $actual ) );
    }
}
