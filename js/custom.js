// get first Monday of the month, useful for determining week durations
// @param - integer: month - which month
// @param - integer: year - which year
function firstMonday ()
{
  var month = new Date().getMonth();
  var year = new Date().getFullYear();
  var d = new Date(year, month, 1, 0, 0, 0, 0)
  var day = 0

  // check if first of the month is a Sunday, if so set date to the second
  if (d.getDay() == 0)
  { 
    day = 2
    d = d.setDate(day)
    d = new Date(d)
  }
  // check if first of the month is a Monday, if so return the date, otherwise get to the Monday following the first of the month
  else if (d.getDay() != 1)
  {
    day = 9-(d.getDay())
    d = d.setDate(day)
    d = new Date(d)
  } return d 
}