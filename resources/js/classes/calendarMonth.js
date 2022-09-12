export default class CalendarMonth {
    fullDate; year; month; date; day; 
    firstDay;

    numDays; previousMonth; nextMonth;

    constructor(dateObj) {
        this.fullDate = dateObj;
        this.year = this.fullDate.getFullYear();
        this.month = this.fullDate.getMonth();
        this.date = this.fullDate.getDate();
        this.day = this.fullDate.getDay() === 0 
            ? 6 : this.fullDate.getDay() - 1;

        this.firstDay = new Date(this.year, this.month, 1).getDay();
        this.firstDay === 0 ? this.firstDay = 6 : this.firstDay--;
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