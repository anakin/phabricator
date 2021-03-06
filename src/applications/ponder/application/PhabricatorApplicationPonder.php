<?php

/*
 * Copyright 2012 Facebook, Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *   http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

final class PhabricatorApplicationPonder extends PhabricatorApplication {

  public function getBaseURI() {
    return '/ponder/';
  }

  public function getShortDescription() {
    return 'Find Answers';
  }

  public function getIconURI() {
    return celerity_get_resource_uri('/rsrc/image/app/app_ponder.png');
  }

  public function getFactObjectsForAnalysis() {
    return array(
      new PonderQuestion(),
    );
  }

  public function loadStatus(PhabricatorUser $user) {
    // replace with "x new unanswered questions" or some such
    $status = array();

    return $status;
  }

  public function getroutes() {
    return array(
      '/Q(?P<id>\d+)' => 'PonderQuestionViewController',
      '/ponder/' => array(
        '(?P<page>feed/)?' => 'PonderFeedController',
        '(?P<page>profile)/' => 'PonderFeedController',
        'answer/add/' => 'PonderAnswerSaveController',
        'answer/preview/' => 'PonderAnswerPreviewController',
        'question/ask/' => 'PonderQuestionAskController',
        'question/preview/' => 'PonderQuestionPreviewController',
        '(?P<kind>question)/vote/' => 'PonderVoteSaveController',
        '(?P<kind>answer)/vote/' => 'PonderVoteSaveController'
      ));
  }
}

