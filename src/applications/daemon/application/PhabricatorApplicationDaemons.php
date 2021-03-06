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

final class PhabricatorApplicationDaemons extends PhabricatorApplication {

  public function getName() {
    return 'Daemon Console';
  }

  public function getShortDescription() {
    return 'Manage Daemons';
  }

  public function getBaseURI() {
    return '/daemon/';
  }

  public function getTitleGlyph() {
    return "\xE2\x98\xAF";
  }

  public function getRoutes() {
    return array(
      '/daemon/' => array(
        'task/(?P<id>\d+)/' => 'PhabricatorWorkerTaskDetailController',
        'task/(?P<id>\d+)/(?P<action>[^/]+)/'
          => 'PhabricatorWorkerTaskUpdateController',
        'log/' => array(
          '' => 'PhabricatorDaemonLogListController',
          'combined/' => 'PhabricatorDaemonCombinedLogController',
          '(?P<id>\d+)/' => 'PhabricatorDaemonLogViewController',
        ),
        'timeline/' => 'PhabricatorDaemonTimelineConsoleController',
        'timeline/(?P<id>\d+)/' => 'PhabricatorDaemonTimelineEventController',
        '' => 'PhabricatorDaemonConsoleController',
      ),
    );
  }

}
