<?php

/*                                                                        *
 * This script belongs to the FLOW3 package "Fluid".                      *
 *                                                                        *
 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the GNU General Public License as published by the Free   *
 * Software Foundation, either version 3 of the License, or (at your      *
 * option) any later version.                                             *
 *                                                                        *
 * This script is distributed in the hope that it will be useful, but     *
 * WITHOUT ANY WARRANTY; without even the implied warranty of MERCHAN-    *
 * TABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General      *
 * Public License for more details.                                       *
 *                                                                        *
 * You should have received a copy of the GNU General Public License      *
 * along with the script.                                                 *
 * If not, see http://www.gnu.org/licenses/gpl.html                       *
 *                                                                        *
 * The TYPO3 project - inspiring people to share!                         *
 *                                                                        */

require_once(dirname(__FILE__) . '/ViewHelperBaseTestcase.php');
/**
 * @version $Id: BaseViewHelperTest.php 3109 2009-08-31 17:22:46Z bwaidelich $
 */
class Tx_Fluid_ViewHelpers_BaseViewHelperTest_testcase extends Tx_Fluid_ViewHelpers_ViewHelperBaseTestcase {
	/**
	 * @test
	 * @author Sebastian Kurfürst <sebastian@typo3.org>
	 */
	public function renderTakesBaseURIFromControllerContext() {
		$baseURI = 'http://typo3.org/';

		$this->request->expects($this->any())->method('getBaseURI')->will($this->returnValue($baseURI));

		$viewHelper = new Tx_Fluid_ViewHelpers_BaseViewHelper();
		$this->injectDependenciesIntoViewHelper($viewHelper);

		$expectedResult = '<base href="' . $baseURI . '"></base>';
		$actualResult = $viewHelper->render();
		$this->assertSame($expectedResult, $actualResult);
	}
}
?>