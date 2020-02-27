<?php

/**
 * Description of GoogleCalendar
 *
 * @author johnish
 */
class GoogleCalendar {

  // http://www.google.com/googlecalendar/event_publisher_guide_detail.html
  //characters that are not allowed in CGI parameter values
  // http://support.google.com/calendar/bin/answer.py?hl=en&answer=37292
  private $disallowed = array('=',);
  public $eventTitle, $eventStartTime, $eventEndTime, $eventLocation, $timeZone;
  //http://www.google.com/googlecalendar/event_publisher_guide.html
  //example link to create google calendar
  // <a href="http://www.google.com/calendar/event?action=TEMPLATE&text=Team%201%20vs%202
  // &dates=20120209T010000Z/20120209T020000Z&details=&location=Rustin%20Bayard%20Gym%207th%20Floor
  // &trp=true&sprop=www.gothamvolleyball.org&sprop=name:Gotham%20Volleyball" target="_blank">
  // <img src="//www.google.com/calendar/images/ext/gc_button1.gif" alt="0" border="0"></a>

  
  /**
   * example URL from Facebook calendar export
   * http://www.google.com/calendar/event?action=TEMPLATE&pprop=eidmsgid%3A_ckoj8dpp6sq3ad9j6kr34e9g68sk0pj1cdim4rrfdcn66rrd_148b3960b4474479&dates=20141024T190000%2F20141024T220000&text=Bradley%27s%20Birthday%20Ballyhoo!&location=Therapy&details=Bradley%20begins%20being%20barely%2030!%20Bring%20blondes%2C%20brunettes%20and%20banditos%2C%20but%20bimbos%20are%20banned.%0A%0Ahttps%3A%2F%2Fwww.facebook.com%2Fevents%2F1479745535629029%2F&add=johnish%40gmail.com&ctok=am9obmlzaEBnbWFpbC5jb20
   * 
   */
  
  /**
   * Constructor
   * @param array $config 
   */
  public function __construct() {
    //set local timezone
    date_default_timezone_set("America/Argentina/Buenos_Aires");
    $this->timeZone = "America/Argentina/Buenos_Aires";

    $this->_config = array('url' => 'http://www.google.com/calendar/event?',
        'title' => '',
        'datetime' => array('start' => '2012-12-01 00:00', 'end' => '2012-12-01 00:00'),
        'location' => '',
        'description' => '',
       // 'appendToURL' => 'action=TEMPLATE&amp;trp=true&amp;sprop=www.gothamvolleyball.org&amp;sprop=name:Gotham%20Volleyball',
	    'appendToURL' => '',
        'linkTarget' => '_blank',
        'showImage' => 'true',
        'showText' => 'false',
        'linkImage' => '//www.google.com/calendar/images/ext/gc_button1.gif',
        'linkText' => '+calendar',
        'target'    => '_blank'
    );
//    parent::__construct($config + $defaults);
  }

  /**
   * kind of like a rename, instead of config['title'] use 'text'
   */
  private function configMapping() {
    $configMapping = array('title' => 'text', 'datetime' => 'dates', 'description' => 'details',);
  }

  private function formatTime($time) {
    date_default_timezone_set($this->timeZone);
    $tempStart = strtotime($time . " ".$this->timeZone);
    $inDSTNow = date('I'); // this will be 1 in DST or else 0
    $eventInDST = date('I', $tempStart);
    //if we aren't in DST right now but this date is in DST we need to compensate for a google glitch and subtract an hour
    if (!$inDSTNow && $eventInDST) {
      $date = new DateTime();
      $date->setTimestamp($tempStart);
      $date->modify('-1 hour');
      $tempStart = $date->getTimestamp();
    }
    echo "\n<!-- formatTime ".$time." and strtotime says ".$tempStart." -->\n";
    $tempStart = Dates::convert_to_timezone($tempStart, 'Universal');
    return date('Ymd\THis\Z', $tempStart);
  }
  
  /**
   *
   * @param array $params -the various information for the calendar event 
   *  ('title'=>'the event title goes here',
   *  'datetime'=>array('start'=> '2012-12-01 00:00', 'end' => '2012-12-01 00:00'),
   *  'sprop'=>'website:www.gothamvolleyball.org&sprop;=name: Gotham Volleyball',
   *  'add'=>'email address of the guest to invite',
   *  'details'=>'Description of the event. Simple HTML is allowed.',
   *  'location'=>'Where the event will take place',
   *  'trp'=>true/false if you want to show the user as busy during this event    
   *  'target'=> URL target (i.e. open in new window) _blank, _self, _top, _parent, (framename)
   * @param type $returnButton 
   */
  public function createEventReminder($params, $returnButton=false) {
    $gCal = new GoogleCalendar();
    $params += $gCal->_config;
    $eventTitle = $params['title'];
    /* Date and time of the event, in UTC format */
    $eventStartTime = $gCal->formatTime($params['datetime']['start']);
    $eventEndTime = $gCal->formatTime($params['datetime']['end']);
    $eventLocation = $params['location'];
    return '<a title="Add to My Google Calendar" class="addtogooglecalendar" target="'.$params['target'].'" href="'.$params['url'].'action=TEMPLATE&text='.$eventTitle.'&dates='.$eventStartTime.'/'.$eventEndTime.'&location='.$eventLocation.'&details='.$params['description'].'&trp=true&sprop=website:http://www.gothamvolleyball.org&sprop=name:Gotham Volleyball"><img src="//www.google.com/calendar/images/ext/gc_button2.gif"></a>';
  }

  public function setTimeZone($timeZone = "America/Argentina/Buenos_Aires") {
    $this->timeZone = $timeZone;
    date_default_timezone_set($timeZone);
  }
  
  /* Instructions for making Google Calendar event reminder buttons
   * http://www.google.com/googlecalendar/event_publisher_guide_detail.html
    Parameter Name	 Value	 Example
    action (required)	 This value is always TEMPLATE (all capitalized).	action=TEMPLATE
    text (required)	 Event title.                                           text=Brunch at Java Cafe
    dates (required)	 Date and time of the event, in UTC format. Append a capitalized letter “Z” to the end of times. Google Calendar will interpret the date and time for the user’s time zone.	dates=20060415/20060415 for all day, April 15th 2006
                                                                                dates=20060415T180000Z/20060415T190000Z for April 15th 2006 11:00am - noon Pacific Time
    sprop (required)	 Information to identify your organization, like your website address. Multiple sprop parameters are allowed. This information should be specified as type:value. The colon character should only be used to separate type and value.	sprop=website:www.javacafebrunches.com
    for website = www.javacafebrunches.com                                      sprop=website:www.javacafebrunches.com&sprop;=name:Java Cafe for website = www.javacafebrunches.com and name = Java Cafe
    add	 Email address of the guest to invite. Multiple add parameters are allowed.
                                                                                add=username1@domain.comfor one guest
                                                                                add=username1@domain.com&add;=username2@domain.com for two guests
    details	 Description of the event. Simple HTML is allowed.              details=Try our Saturday brunch special:<br><br>French toast with fresh fruit<br><br>Yum!
    location	 Where the event will take place. Locations that work as Google Maps queries are recommended.	
                                                                                location=Java Cafe, San Francisco, CA
    trp	 Specifies whether the user’s Google Calendar shows as “busy” during this event. The default value is false.	
                                                                                trp=true
    Example HTML for a Google Calendar event reminder button

    Here is what the CGI parameters would look like for brunch reservations:

    action=TEMPLATE
    text=Brunch at Java Cafe
    location=Java Cafe, San Francisco, CA
    details=Try our Saturday brunch special:<br><br>French
    toast with fresh fruit<br><br>Yum!
    dates=20060415T180000Z/20060415T190000Z
    trp=true
    sprop=website:http://www.javacafebrunches.com
    sprop=name:Jave Cafe
    Putting it all together, here’s the whole snippet of HTML you would add to your website to insert the Google Calendar event reminder button for this brunch reservation:

    <a href="http://www.google.com/calendar/event?action=
    TEMPLATE&text;=Brunch at Java Cafe&dates;=20060415T180000Z/
    20060415T190000Z&location;=Java Cafe, San Francisco, CA
    &details;=Try our Saturday brunch special:<br><br>French
    toast with fresh fruit<br><br>Yum!&trp;=true&sprop;=
    website:http://www.javacafebrunches.com&sprop;=name:Jave Cafe">
    <img src="//www.google.com/calendar/images/ext/
    gc_button2.gif"></a>
   * 
   * 100 x 25px Google Calendar
   * http://www.google.com/calendar/images/ext/gc_button1.gif
     114 x 36px remind me with Google Calendar
     http://www.google.com/calendar/images/ext/gc_button2.gif
     114 x 36px Add to Google Calendar
     http://www.google.com/calendar/images/ext/gc_button6.gif
   * 
   */
}

?>
