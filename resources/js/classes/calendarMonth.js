export default class CalendarMonth {
    _fullDate; _year; _month; _date; _day; 
    _firstDay;

    _numDays; _previousMonth; _nextMonth;

    constructor(dateObj) {
        this._fullDate = dateObj;
        this._year = this._fullDate.getFullYear();
        // this._month = monthArr[this._fullDate.getMonth()].name;
        this._month = this._fullDate.getMonth();
        this._date = this._fullDate.getDate();
        this._day = this._fullDate.getDay() === 0 
            ? 0 //daysArr[daysArr.length - 1] 
            : this._fullDate.getDay() // daysArr[this._fullDate.getDay() - 1];

        this._firstDay = new Date(`1 ${this._month} ${this._year}`).getDay();

        // this._numDays = monthArr[this._fullDate.getMonth()].days;

        /* this._previousMonth = this._fullDate.getMonth() !== 0 
                    ? monthArr[this._fullDate.getMonth() - 1] 
                    : monthArr[monthArr.length - 1]; */

        /* this._nextMonth = this._fullDate.getMonth() !== 11
                    ? monthArr[this._fullDate.getMonth() + 1]
                    : monthArr[monthArr[0]]; */
    }

    get fullDate () {
        return this._fullDate;
    }
    get year () {
        return this._year;
    }

    get month() { 
        return this._month;
    }
    get day() {
        return this._day;
    }

    get date() {
        return this._date;
    }
    
    get firstDay() {
        return this._firstDay;
    }

    get numDays() {
        return this._numDays;
    }

    set numDays(num) {
        this._numDays = num;
    }

    get previousMonth() {
        return this._previousMonth;
    }

    set previousMonth(month){
        this._previousMonth = month;
    }

    get nextMonth() {
        return this._next_month;
    }

    set nextMonth(month) {
        this._nextMonth = month;
    }
}