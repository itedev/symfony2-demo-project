<?php

namespace ITE\DemoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use ITE\FormBundle\Annotation as ITEForm;

/**
 * Entity
 *
 * @ORM\Table(name="entity")
 * @ORM\Entity(repositoryClass="ITE\DemoBundle\Entity\Entity2Repository")
 */
class Entity
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="text", type="string", length=255)
     */
    private $text;

    /**
     * @var string
     *
     * @ORM\Column(name="textarea", type="text")
     */
    private $textarea;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     * @ITEForm\Type("email")
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255)
     * @ITEForm\Type("password")
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=255)
     * @ITEForm\Type("url")
     */
    private $url;

    /**
     * @var bool
     *
     * @ORM\Column(name="boolean", type="boolean")
     */
    private $boolean = false;

    /**
     * @var integer
     *
     * @ORM\Column(name="select_choice", type="integer")
     * @ITEForm\Type(type="choice", options={
     *      "choices": {
     *          1: "one",
     *          2: "two",
     *          3: "three",
     *          4: "four",
     *          5: "five",
     *      }
     * })
     */
    private $selectChoice;

    /**
     * @var array
     *
     * @ORM\Column(name="multiple_select_choice", type="json_array")
     * @ITEForm\Type(type="choice", options={
     *      "choices": {
     *          1: "one",
     *          2: "two",
     *          3: "three",
     *          4: "four",
     *          5: "five",
     *      },
     *      "multiple": true
     * })
     */
    private $multipleSelectChoice;

    /**
     * @var integer
     *
     * @ORM\Column(name="radio_choice", type="integer")
     * @ITEForm\Type(type="choice", options={
     *      "choices": {
     *          1: "one",
     *          2: "two",
     *          3: "three",
     *          4: "four",
     *          5: "five",
     *      },
     *      "expanded": true
     * })
     */
    private $radioChoice;

    /**
     * @var array
     *
     * @ORM\Column(name="checkbox_choice", type="json_array")
     * @ITEForm\Type(type="choice", options={
     *      "choices": {
     *          1: "one",
     *          2: "two",
     *          3: "three",
     *          4: "four",
     *          5: "five",
     *      },
     *      "expanded": true,
     *      "multiple": true
     * })
     */
    private $checkboxChoice;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date")
     */
    private $date;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datetime", type="datetime")
     */
    private $datetime;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="time", type="time")
     */
    private $time;

    /**
     * @var integer
     *
     * @ORM\Column(name="select2", type="integer")
     * @ITEForm\Type(type="ite_select2_choice", options={
     *      "choices": {
     *          1: "one",
     *          2: "two",
     *          3: "three",
     *          4: "four",
     *          5: "five",
     *      },
     *      "plugin_options": {
     *          "width": 150
     *      }
     * })
     */
    private $select2;

    /**
     * @var string
     *
     * @ORM\Column(name="tinymce", type="text")
     * @ITEForm\Type("ite_tinymce_textarea")
     */
    private $tinymce;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="bootstrap_datetimepicker_datetime", type="datetime")
     * @ITEForm\Type("ite_bootstrap_datetimepicker_datetime")
     */
    private $bootstrapDatetimepickerDatetime;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="bootstrap_datetimepicker_date", type="date")
     * @ITEForm\Type("ite_bootstrap_datetimepicker_date")
     */
    private $bootstrapDatetimepickerDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="bootstrap_datetimepicker_time", type="time")
     * @ITEForm\Type("ite_bootstrap_datetimepicker_time")
     */
    private $bootstrapDatetimepickerTime;

    /**
     * @var integer
     *
     * @ORM\Column(name="knob", type="integer")
     */
    private $knob;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set text
     *
     * @param string $text
     * @return Entity
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Get text
     *
     * @return string 
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set textarea
     *
     * @param string $textarea
     * @return Entity
     */
    public function setTextarea($textarea)
    {
        $this->textarea = $textarea;

        return $this;
    }

    /**
     * Get textarea
     *
     * @return string 
     */
    public function getTextarea()
    {
        return $this->textarea;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Entity
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return Entity
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set url
     *
     * @param string $url
     * @return Entity
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string 
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set selectChoice
     *
     * @param integer $selectChoice
     * @return Entity
     */
    public function setSelectChoice($selectChoice)
    {
        $this->selectChoice = $selectChoice;

        return $this;
    }

    /**
     * Get selectChoice
     *
     * @return integer
     */
    public function getSelectChoice()
    {
        return $this->selectChoice;
    }

    /**
     * Set multipleSelectChoice
     *
     * @param array $multipleSelectChoice
     * @return Entity
     */
    public function setMultipleSelectChoice($multipleSelectChoice)
    {
        $this->multipleSelectChoice = $multipleSelectChoice;

        return $this;
    }

    /**
     * Get multipleSelectChoice
     *
     * @return array
     */
    public function getMultipleSelectChoice()
    {
        return $this->multipleSelectChoice;
    }

    /**
     * Set radioChoice
     *
     * @param integer $radioChoice
     * @return Entity
     */
    public function setRadioChoice($radioChoice)
    {
        $this->radioChoice = $radioChoice;

        return $this;
    }

    /**
     * Get radioChoice
     *
     * @return integer
     */
    public function getRadioChoice()
    {
        return $this->radioChoice;
    }

    /**
     * Set checkboxChoice
     *
     * @param array $checkboxChoice
     * @return Entity
     */
    public function setCheckboxChoice($checkboxChoice)
    {
        $this->checkboxChoice = $checkboxChoice;

        return $this;
    }

    /**
     * Get checkboxChoice
     *
     * @return array 
     */
    public function getCheckboxChoice()
    {
        return $this->checkboxChoice;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Entity
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set datetime
     *
     * @param \DateTime $datetime
     * @return Entity
     */
    public function setDatetime($datetime)
    {
        $this->datetime = $datetime;

        return $this;
    }

    /**
     * Get datetime
     *
     * @return \DateTime 
     */
    public function getDatetime()
    {
        return $this->datetime;
    }

    /**
     * Set time
     *
     * @param \DateTime $time
     * @return Entity
     */
    public function setTime($time)
    {
        $this->time = $time;

        return $this;
    }

    /**
     * Get time
     *
     * @return \DateTime 
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * Set select2
     *
     * @param integer $select2
     * @return Entity
     */
    public function setSelect2($select2)
    {
        $this->select2 = $select2;

        return $this;
    }

    /**
     * Get select2
     *
     * @return integer
     */
    public function getSelect2()
    {
        return $this->select2;
    }

    /**
     * Set tinymce
     *
     * @param string $tinymce
     * @return Entity
     */
    public function setTinymce($tinymce)
    {
        $this->tinymce = $tinymce;

        return $this;
    }

    /**
     * Get tinymce
     *
     * @return string 
     */
    public function getTinymce()
    {
        return $this->tinymce;
    }

    /**
     * Set bootstrapDatetimepickerDatetime
     *
     * @param \DateTime $bootstrapDatetimepickerDatetime
     * @return Entity
     */
    public function setBootstrapDatetimepickerDatetime($bootstrapDatetimepickerDatetime)
    {
        $this->bootstrapDatetimepickerDatetime = $bootstrapDatetimepickerDatetime;

        return $this;
    }

    /**
     * Get bootstrapDatetimepickerDatetime
     *
     * @return \DateTime 
     */
    public function getBootstrapDatetimepickerDatetime()
    {
        return $this->bootstrapDatetimepickerDatetime;
    }

    /**
     * Set bootstrapDatetimepickerDate
     *
     * @param \DateTime $bootstrapDatetimepickerDate
     * @return Entity
     */
    public function setBootstrapDatetimepickerDate($bootstrapDatetimepickerDate)
    {
        $this->bootstrapDatetimepickerDate = $bootstrapDatetimepickerDate;

        return $this;
    }

    /**
     * Get bootstrapDatetimepickerDate
     *
     * @return \DateTime 
     */
    public function getBootstrapDatetimepickerDate()
    {
        return $this->bootstrapDatetimepickerDate;
    }

    /**
     * Set bootstrapDatetimepickerTime
     *
     * @param \DateTime $bootstrapDatetimepickerTime
     * @return Entity
     */
    public function setBootstrapDatetimepickerTime($bootstrapDatetimepickerTime)
    {
        $this->bootstrapDatetimepickerTime = $bootstrapDatetimepickerTime;

        return $this;
    }

    /**
     * Get bootstrapDatetimepickerTime
     *
     * @return \DateTime 
     */
    public function getBootstrapDatetimepickerTime()
    {
        return $this->bootstrapDatetimepickerTime;
    }

    /**
     * Set knob
     *
     * @param integer $knob
     * @return Entity
     */
    public function setKnob($knob)
    {
        $this->knob = $knob;

        return $this;
    }

    /**
     * Get knob
     *
     * @return integer 
     */
    public function getKnob()
    {
        return $this->knob;
    }

    /**
     * Set boolean
     *
     * @param bool $boolean
     * @return Entity
     */
    public function setBoolean($boolean)
    {
        $this->boolean = $boolean;

        return $this;
    }

    /**
     * Get boolean
     *
     * @return bool
     */
    public function getBoolean()
    {
        return $this->boolean;
    }

}
