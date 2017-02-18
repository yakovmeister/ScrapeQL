<?php

namespace Yakovmeister\ScrapeQL;

class Struct
{
	/**
	 * I don't what should I name this class so temporarily I named 
	 * it Struct, short for structure.
	 * 
	 * Apparently the plan is to scrape things using SQL based query
	 * so instead of relying on good old DOMDocument and DOMXpath I'll 
	 * be creating my own simple yet working regex based scrape but... yea
	 * to make queries easier to remember I'll semi based the queries on SQL.
	 * ----------------------------------------------------------------------
	 * So for instance in order for us to scrape all <b></b> tags inside an HTML
	 * document we'll be doing:
	 * SELECT * FROM [{$htmlstring}] WHERE name = <b>
	 * ----------------------------------------------------------------------- 
	 * it will then return an array containing the results, you get the idea?
	 * basically what I'm actually aiming is to make HTML tag names and attributes as 
	 * the column.
	 * names can be: html, head, body, p, a, b, img, and so on...
	 * attributes can be: style, width, data-src, and so on...
	 * that should give you the idea.
	 *
	 * Note that it can only accept a variable containing an HTML source code, 
	 * or the HTML source code itself... 
	 * 
	 * @version 0.1.2 
	 *          - removed empty tags
	 *			- sql syntax based operators are removed
	 *			- applied regex tweak, still didn't improve accuracy (most stupid regex I have wrote)
	 * @version 0.1.1 
	 *          - inaccurate scraper but working
	 */
	
	/**
	 * identify whether tag is supplied already
	 * @var integer
	 */
	protected $tag_flag = 0;

	/**
	 * We'll call the HTML String as source
	 * @var string
	 */
	protected $source;

	/**
	 * Previous HTML sources are stored here once new source is introduced
	 * @var array
	 */
	protected $oldSource = [];

	/**
	 * Elements you want to return as results
	 * @var mixed
	 */
	protected $elements;

	/**
	 * criteria for scraping
	 * @var array
	 */
	protected $criteria = [];

	/**
	 * value <tags|attributes>
	 * @var string
	 */
	protected $groupBy;

	/**
	 * be it top to bottom or vice versa
	 * value: [<tags|attributes>, <asc|desc>]
	 * @var string
	 */
	protected $orderBy = [];

	/**
	 * returns the criteria array
	 * @return array list of criteria
	 */
	public function getCriteria()
	{
		return $this->criteria;
	}

	/**
	 * fetch the source
	 * @return object::$source
	 */
	public function getSource()
	{
		return $this->source;
	}

	/**
	 * Set the elements you want to return as results
	 * @param  mixed  $elements elements you want to capture
	 * @return $this 
	 */
	public function select($elements = ["*"])
	{
		$this->elements = is_array($elements) ? $elements : func_get_args();

		return $this;
	}

	/**
	 * Pretty straightforward, set the html page as source
	 * @param  string $html HTML string you want to scrape
	 * @return $this
	 */
	public function source($html)
	{
		if(!empty($this->source)) {
			array_push($this->oldSource, $this->source);
			unset($this->source);
		}

		$this->source = $html;

		return $this;
	}

	/**
	 * Disregard current source and use previous source
	 * @return $this
	 */
	public function rollback()
	{
		unset($this->source);

		$this->source = $this->oldSource[count($this->oldSource) - 1];

		return $this;
	}

	/**
	 * Set the criteria of scraper
	 * @param  string  $column      <tag|attribute>
	 * @param  string  $identifier  what attribute or tag are we looking for?
	 * @param  mixed   $value       only applicable for attribute: the value of the attr
	 * @return $this
	 */
	public function where($column, $identifier = null, $value = null)
	{
		array_push($this->criteria, [
			"column"   		=> $column,
			"identifier" 	=> $identifier,
			"value"			=> $value
		]);

		return $this;
	}

	/**
	 * set grouping of results
	 * @param  string $by value: <tags|attributes>, default: tags
	 * @return $this
	 */
	public function groupBy($by = "tags")
	{
		$this->groupBy = $by;

		return $this;
	}

	/**
	 * order of results
	 * @param  string $column    value: <tags|attributes>
	 * @param  string $direction value: <asc|desc>
	 * @return $this
	 */
	public function orderBy($column, $direction = "asc")
	{
		$direction = strtolower($direction) == "asc" ?? "desc";

		$this->orders = compact("column", "direction");

		return $this;
	}

	/**
	 * capture and return matched data
	 * @return $result
	 */
	public function fetch()
	{
		$grammar = $this->constructPattern();

		preg_match_all($grammar, $this->source, $result);

		return $result;
	}

	/**
	 * create regex pattern that is suitable to use
	 * @return string $grammar
	 */
	public function constructPattern()
	{
		// Grammar for full HTML tags
		$grammar = "/(<(\/)?{tag}(.*{attributes})?(.*)?(\/)?>)(.*)?(<\/(.*)?{tag}(.*)?>)?/";
	
		$criteriaSize = count($this->getCriteria()) - 1;


		foreach ($this->getCriteria() as $key => $value) {

			if($value["column"] == "tag" && $this->tag_flag < 1) 
			{
				$grammar = str_replace("{tag}", $value["identifier"], $grammar);
				
				$this->tag_flag = 1;
			} 

			if($value["column"] == "attribute") 
			{
				if(isset($value["value"])) {
	 				$grammar = str_replace("{attributes}", "{$value["identifier"]}=\"{$value["value"]}\"(.*)?{attributes}", $grammar);
				} else {
	 				$grammar = str_replace("{attributes}", "{$value["identifier"]}(.*)?{attributes}", $grammar);	
				}
			}

			if($key == $criteriaSize) {
				$grammar = str_replace("{attributes}", "", $grammar);
			}
		}
 
		return $grammar;
	}

	/**
	 * straightforward, unset everything.
	 * @return bool true
	 */
	public function flush()
	{
		array_push($this->oldSource, $this->source);
		unset($this->source);
		unset($this->elements);
		unset($this->criteria);
		unset($this->groupBy);
		unset($this->orderBy);

		return true;
	}

	public function __construct(){ }

} 